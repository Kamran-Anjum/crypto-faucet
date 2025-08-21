<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Contact;

class AdminController extends Controller
{
    //login ADMIN
    public function login(Request $request)
    {
    	if (Auth::check()) {
		    	
    		return redirect('/admin/dashboard');

		}else if($request->isMethod('post')){

    		$data = $request->input();

			if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
            {
                if(Auth::user()->hasrole('admin')){
                  $check=true;
                }else{
                    Auth::logout();
                    $check=false;                    
                }

            }
            else{
                $check=false;
             
            }

            $user=Auth::user();
            
            if ($user) {
                 return redirect('/admin/dashboard');
            }
            else{

                return redirect('/admin')->with('flash_message_error','  Wronge email or password!  ');  
            }
			
		}else{

			return view('admin.admin-login');

		}

    }

    // admin dashboard
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->hasrole('admin')) {

                $count_users = User::where('id', '!=', 1)->where(['isDeleted'=>0])->count();
                $count_contact = Contact::where(['read_msg'=>0])->count();
               
                return view('admin.dashboard')->with(compact('count_users', 'count_contact'));
            }
            else{
                Auth::logout();
                return redirect('/admin');
            }
        }else{
            return redirect('/admin');
        }
      

    }


    // admin register
    public function register(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->input();

        	$check = User::select('id')->where('email',$data['email'])->count();

	        if ($check == 0) {

	             $user = new User;
	             $user->name = $data['name'];
	             $user->email = $data['email'];
	             $user->password = bcrypt($data['password']);
	             $user->assignRole('admin');
	             $user->save();

	            if($user){
	                return redirect('/admin')->with('flash_message_success','Successfulyy Registered! ');
	            }else{
	                return redirect()->back()->with('flash_message_error',' Opps..Not Registered! ');
	            }

	        }else{
	            return redirect()->back()->with('flash_message_error',' This email is already registered. ');
	        }

	    }else{

	    	return view('admin.admin-register');

	    }
    }

 //chnage password
    //  public function change_pwd()
    // {
    //      return view('admin.change-password');            
    // }
    public function change_password(Request $request)
    {
    	if($request->isMethod('post')){

    		$data = $request->input();
	       // dd($request->currentPassword);
	        if (!(Hash::check($request->currentPassword, Auth::user()->password))) {
	            // The passwords matches
	             return redirect()->back()->with('flash_message_error',' Your current password does not matches with the password you provided. Please try again.  ');
	        }

	        if(strcmp($request->currentPassword, $request->newPassword) == 0){
	            //Current password and new password are same
	              return redirect()->back()->with('flash_message_error',' New Password cannot be same as your current password. Please choose a different password. ');
	        }

	        // Change Password
	        $user = Auth::user();       
	        $pass=bcrypt($request->newPassword);
	         $result=$user->update(['password'=>$pass]);

	        if ($result) {
	            return redirect()->back()->with('flash_message_success','Password Change Successfulyy...!');
	        }
	        else{
	            return redirect()->back()->with('flash_message_success','Password Not Changed...!');
	        }
	    }

	    return view('admin.change-password');   

    }

    
    //admin logout
    public function logout(){
    	Auth::logout();
    	return redirect('/admin');
    }
}
