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

        $get_per_day_limit = PerDayLimit::first();
        $per_day_limit = $get_per_day_limit->per_day_limit;

        $user_detail = UserDetail::where(['user_id' => $user_id])->first();
        $old_total_reward = $user_detail->total_reward;
        $old_total_reward_value = (string)$user_detail->total_reward_value;

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
            // $new_total_reward_value = bcadd((string)$old_total_reward_value, (string)$reward->reward_value, 10);
            // $new_total_reward_value = rtrim(rtrim($new_total_reward_value, '0'), '.');


            // dd($old_total_reward, $reward->reward_on, $new_total_reward, $old_total_reward_value, $reward->reward_value, $new_total_reward_value, $cur_time, $timer_time);

            UserDetail::where(['user_id'=>$user_id])->update
            ([
                'total_reward'=>$new_total_reward,
                'total_reward_value'=>$new_total_reward_value
            ]);

            return redirect()->back()->with('flash_message_success','Please wait till timer ends');

        }

        $reward_timer = UserRewardCliam::where(['user_id'=>$user_id])->orderBy('id', 'desc')->first();

        $cur_date = date('Y-m-d');
        $reward_count = UserRewardCliam::where(['user_id'=>$user_id])->where('created_at', 'LIKE', '%'.$cur_date.'%')->count();

        // dd($reward_timer, $cur_time, $timer_time);

        return view('user.faucet.faucet')->with(compact('timer', 'reward', 'reward_timer', 'cur_time', 'user_detail', 'per_day_limit', 'reward_count'));

    }
}
