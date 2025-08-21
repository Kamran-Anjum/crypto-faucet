<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ReferralCommisionPercentage;

class ReferralController extends Controller
{
    // Admin function start
    public function editReferralPercentage(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            ReferralCommisionPercentage::where(['id'=>1])->update
            ([
                'referral_percentage'=>$data['referral_percentage'],
            ]);

            return redirect()->back()->with('flash_message_success','Referral Percentage Updated Successfully!');
        }

        $ref_per = ReferralCommisionPercentage::where(['id'=>1])->first();

        return view('admin.referral-percentage.referral-percentage')->with(compact('ref_per'));

    }
    // Admin funciton end
    // ============================================================================
    // User function start

    public function userReferrals(){

        $user_id = Auth::user()->id;

        $ref_per = ReferralCommisionPercentage::first();

        $user_referral = User::where(['id'=>$user_id])->first();

        $referrals = User::where(['referred_by'=>$user_id])->count();

        $referral_users = DB::table('users as u')
                            ->leftjoin('user_reward_cliams as urc', 'u.id', '=', 'urc.user_id')
                            ->select(
                                'u.id',
                                'u.name',
                                'u.created_at',
                                'u.referred_by',
                                DB::raw('COUNT(DISTINCT urc.id) as total_claim_count')
                            )
                            ->where(['u.referred_by'=>$user_id])
                            ->groupBy('u.id', 'u.name', 'u.created_at', 'u.referred_by')
                            ->get();

        // dd($user_referral);

        return view('user.referral.referral')->with(compact('user_referral', 'ref_per', 'referrals', 'referral_users'));

    }

}
