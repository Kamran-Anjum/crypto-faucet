<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\SetReward;
use Validate;
use Session;
use Mail;
use App\Mail\ForgotPasswrod;
use App\Mail\AcccountActivationMail;

class UserController extends Controller
{
    // Admin function start here
    public function viewUser()
    {
        $users = DB::table('users')->whereNot(['id' => 1, 'isDeleted' => 0])->orderBy('id', 'desc')->get();

        return view('admin.users.view-user')->with(compact('users'));
    }

    public function addUser(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            $chkemail = User::where(['email' => $data['email']])->count();
            $chkname = User::where(['name' => $data['name']])->count();

            if ($chkemail > 0) {

                return redirect()->back()->with('flash_message_error', 'Email Already Exist');

            } elseif ($chkname > 0) {

                return redirect()->back()->with('flash_message_error', 'User name Already Exist');

            } else {

                $user = new User();
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->referral_code = bin2hex(random_bytes(10)) . date('Ymdhis');
                $checkuser = $user->save();
                $user->assignRole('user');

                $get_currency = SetReward::first();

                $user_detail = new UserDetail();
                $user_detail->user_id = $user->id;
                $user_detail->currency = $get_currency->currency;
                $user_detail->save();

                return redirect('/admin/view-users')->with('flash_message_success', 'User Added Successfully!');

            }

        }

        return view('admin.users.create-user');

    }

    public function editUser(Request $request, $id)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            User::where(['id' => $id])->update
            ([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isActive' => $data['isActive'],
                ]);

            return redirect('/admin/view-users')->with('flash_message_success', 'User Updated Successfully!');
        }

        $user = User::where(['id' => $id])->first();

        return view('admin.users.edit-user')->with(compact('user'));

    }

    public function userChangePasswordAdmin(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            $check_user = User::where(['id' => $data['user_id']])->first();
            $new_password = $data['newpassword'];
            $confirm_password = $data['confirmpassword'];

            if ($new_password == $confirm_password) {

                $password = bcrypt($data['newpassword']);
                // echo $password;
                // die;
                User::where('id', $check_user->id)->update(['password' => $password]);

                return redirect()->back()->with('flash_message_success1', 'Password Changed Successfully. New Password is <strong>' . $new_password . '</strong>');

            } else {

                return redirect()->back()->with('flash_message_error1', 'Password Not Match');

            }

        }

    }

    public function deleteUser($id = null)
    {

        User::where(['id' => $id])->update
        ([
                'isDeleted' => 1,
            ]);

        return redirect()->back()->with('flash_message_success', 'User Deleted Successfully!');

    }
    // End of admin functions
    // -------------------------------------------------------------------------------------
    // Front Client Fucntion Start
    public function userSingup(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            $request->validate([
                'g-recaptcha-response' => 'required|captcha'
            ]);

            $chkemail = User::where(['email' => $data['email']])->count();
            $chkname = User::where(['name' => $data['name']])->count();

            if ($chkemail > 0) {

                return redirect()->back()->with('flash_message_error', 'Email Already Exist');

            } elseif ($chkname > 0) {

                return redirect()->back()->with('flash_message_error', 'User Name Already Exist');

            } else {

                $referralCode = session('referral_code'); // get referral from session
                $referrer = null;

                if ($referralCode) {
                    $referrer = User::where('referral_code', $referralCode)->first();
                }

                $user = new User();
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->referred_by = $referrer ? $referrer->id : null;
                $user->referral_code = bin2hex(random_bytes(10)) . date('Ymdhis');
                $user->isActive = 0;
                $checkuser = $user->save();
                $user->assignRole('user');

                $get_currency = SetReward::first();

                $user_detail = new UserDetail();
                $user_detail->user_id = $user->id;
                $user_detail->currency = $get_currency->currency;
                $user_detail->save();

                $data_mail = array(
                    'user_id' => $user->id,
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'slug' => bin2hex(random_bytes(10))
                );

                Mail::to($data['email'])->send(new AcccountActivationMail($data_mail));

                Session::flush();

                return redirect('/signup')->with('flash_message_success', 'Singup Successfull. Activation Link Send To Your Email');

            }

        }

        return view('frontend.signup');

    }

    public function activateAccount($id, $slug)
    {

        User::where(['id' => $id])->update
        ([
                'isActive' => 1
            ]);

        return view('frontend.accountActivate');

    }

    public function userLogin(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->input();

            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'isActive' => 1, 'isDeleted' => 0])) {

                $users = Auth::User();

                $user = User::where(['id' => $users->id])->with('roles')->first();

                $role_name = $user->roles->first()->name;
                // dd($role_name);
                if ($role_name == "user") {

                    return redirect('/user/dashboard');

                }

            } elseif (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'isActive' => 0, 'isDeleted' => 0])) {

                return redirect('/login')->with('flash_message_error', 'Your Account is Deactive By Admin');

            } else {

                return redirect('/login')->with('flash_message_error', 'Invalid E-mail or Password');

            }

        }

        return view('frontend.login');

    }

    public function userProfile()
    {

        // get login Student details
        $user = Auth::user();
        $user_id = $user->id;

        $user_info = DB::table('users')->where(['id' => $user_id])->first();

        $user_detail = UserDetail::where(['user_id' => $user_id])->first();

        $reward = SetReward::first();

        $old_total_reward = $user_detail->total_reward;

        $cur_total = $old_total_reward / $reward->reward_on * $reward->reward_value;

        return view('user.dashboard')->with(compact('user_info', 'user_detail', 'cur_total'));

    }

    public function userChangePassword(Request $request)
    {

        $user = Auth::user();
        $user_id = $user->id;

        if ($request->isMethod('post')) {

            $data = $request->all();

            $check_password = User::where(['id' => $user_id])->first();

            $current_password = $data['current_password'];

            if ($data['new_password'] == $data['confirm_password']) {

                if (Hash::check($current_password, $check_password->password)) {

                    $password = bcrypt($data['new_password']);

                    User::where('id', $user_id)->update(['password' => $password]);

                    return redirect()->back()->with('flash_message_success', 'Password Changed Successfully');

                } else {

                    return redirect()->back()->with('flash_message_error', 'Incorrect Current Password ');

                }

            } else {

                return redirect()->back()->with('flash_message_error', 'New Password & Confirm Password Not Match');

            }

        }

        $user_info = DB::table('users')->where(['id' => $user_id])->first();

        return view('user.change-password')->with(compact('user_info'));

    }

    public function userForgotPasswordRequest(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            $check_user = User::where(['email' => $data['email']])->count();
            $get_user = User::where(['email' => $data['email']])->first();

            if ($check_user > 0) {

                $mail_data = array(
                    'user_id' => $get_user->id,
                    'name' => $get_user->name,
                    'email' => $get_user->email
                );
                // dd($data);

                Mail::to($get_user->email)->send(new ForgotPasswrod($mail_data));

                return redirect()->back()->with('flash_message_success', 'Reset Password Link Send To Your Email. Check Your E-mail Account.');

            } else {

                return redirect()->back()->with('flash_message_error', 'User Not Found');

            }

        }

        return view('frontend.forgot-password-request');

    }

    public function userResetPassword(Request $request, $id)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            $check_user = User::where(['id' => $data['user_id']])->first();

            $new_password = $data['new_password'];
            $confirm_password = $data['confirm_password'];

            if ($new_password == $confirm_password) {

                $password = bcrypt($data['new_password']);
                // echo $password;
                // die;
                User::where('id', $check_user->id)->update(['password' => $password]);

                return redirect('/login')->with('flash_message_success', 'Password Updated Now You Can Login');

            } else {

                return redirect()->back()->with('flash_message_error', 'Password Not Match');

            }

        }

        $check_user = User::where(['id' => $id])->first();

        return view('frontend.reset-password')->with(compact('check_user'));

    }

    public function userLogout()
    {

        Auth::logout();
        Session::flush();
        return redirect('/login')->with('flash_message_success', 'Logged out Successfully');

    }
    // End of Front Client Function
}
