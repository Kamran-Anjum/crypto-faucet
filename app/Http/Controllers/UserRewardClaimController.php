<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Timer;
use App\Models\SetReward;
use App\Models\UserRewardCliam;
use App\Models\PerDayLimit;
use App\Models\ReferralCommisionPercentage;
use App\Models\ReferralComission;
use Validate;
use Session;

class UserRewardClaimController extends Controller
{
    public function userFaucet(Request $request)
    {
        $user_id = Auth::user()->id;

        $get_timer_mint = Timer::first();
        $timer = $get_timer_mint->timer_in_mint;

        $cur_time = date('Y-m-d h:i:s');
        $timer_time = date('Y-m-d h:i:s', strtotime($cur_time . ' +'.$timer.' minutes'));

        $reward = SetReward::first();

        $ref_per = ReferralCommisionPercentage::first();

        $get_per_day_limit = PerDayLimit::first();
        $per_day_limit = $get_per_day_limit->per_day_limit;

        $user_detail = UserDetail::where(['user_id' => $user_id])->first();
        $old_total_reward = $user_detail->total_reward;
        $old_total_reward_value = (string)$user_detail->total_reward_value;

        $cur_total = $old_total_reward/$reward->reward_on*$reward->reward_value;

        if($request->isMethod('post')){

            $data = $request->all();

            $claim = new UserRewardCliam();
            $claim->user_id = $user_id;
            $claim->get_reward = $reward->reward_on;
            $claim->get_reward_value = $reward->reward_value;
            $claim->currency = $reward->currency;
            $claim->claim_on = $cur_time;
            $claim->next_claim_after = $timer_time;
            $claim->save();

            $new_total_reward = $old_total_reward+$reward->reward_on;
            $new_total_reward_value = $old_total_reward_value+$reward->reward_value;
            $new_total_reward_value = rtrim(rtrim(sprintf('%.10F', $new_total_reward_value), '0'), '.');

            // dd($old_total_reward, $reward->reward_on, $new_total_reward, $old_total_reward_value, $reward->reward_value, $new_total_reward_value, $cur_time, $timer_time);

            UserDetail::where(['user_id'=>$user_id])->update
            ([
                'total_reward'=>$new_total_reward,
                'total_reward_value'=>$new_total_reward_value
            ]);

            // referred by user ID
            $user_ref_by = Auth::user()->referred_by;

            if ($user_ref_by !== null && $user_ref_by !== '') {

                $ref_user_detail = UserDetail::where(['user_id' => $user_ref_by])->first();
                $ref_old_total_reward = $ref_user_detail->total_reward;

                $total_reward = $reward->reward_on;
                $ref_percentage = $ref_per->referral_percentage;

                $ref_per_rew = $total_reward/100*$ref_percentage;

                $new_reward_ref = $ref_old_total_reward+$ref_per_rew;

                UserDetail::where(['user_id'=>$user_ref_by])->update
                ([
                    'total_reward'=>$new_reward_ref
                ]);

                $ref_com = new ReferralComission();
                $ref_com->referral_user_id = $user_id;
                $ref_com->referred_by_user_id = $user_ref_by;
                $ref_com->amount = $ref_per_rew;
                $ref_com->save();

                // dd($user_ref_by, $ref_old_total_reward, $total_reward, $ref_percentage, $ref_per_rew, $new_reward_ref);

            }

            // dd($user_ref_by);

            return redirect()->back()->with('flash_message_success','Please wait till timer ends');

        }

        $reward_timer = UserRewardCliam::where(['user_id'=>$user_id])->orderBy('id', 'desc')->first();

        $cur_date = date('Y-m-d');
        $reward_count = UserRewardCliam::where(['user_id'=>$user_id])->where('claim_on', 'LIKE', '%'.$cur_date.'%')->count();

        // dd($reward_timer, $cur_time, $timer_time);

        return view('user.faucet.faucet')->with(compact('timer', 'reward', 'reward_timer', 'cur_time', 'user_detail', 'per_day_limit', 'reward_count', 'cur_total'));

    }
}
