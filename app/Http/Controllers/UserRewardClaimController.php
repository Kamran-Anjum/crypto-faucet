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
use App\Models\RewardToken;
use App\Models\Currency;
use App\Models\ExperianceOnClaim;
use App\Models\LevelBonusOnExperiance;
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
        $timer_time = date('Y-m-d h:i:s', strtotime($cur_time . ' +' . $timer . ' minutes'));

        $reward_token = RewardToken::first();

        $exp_on_claim = ExperianceOnClaim::first();

        $l_b_on_exp = LevelBonusOnExperiance::first();

        $currency = Currency::first();
        $reward = SetReward::first();

        $ref_per = ReferralCommisionPercentage::first();

        $get_per_day_limit = PerDayLimit::first();
        $per_day_limit = $get_per_day_limit->per_day_limit;

        $total_reward_count = UserRewardCliam::where(['user_id' => $user_id])->count();

        $user_detail = UserDetail::where(['user_id' => $user_id])->first();
        $cur_base_reward_token = $user_detail->base_reward_token;
        $cur_exp = $user_detail->experiance;
        $cur_level = $user_detail->level;
        $cur_total_reward = $user_detail->total_reward;

        $cur_total = $cur_total_reward / $currency->per_token * $currency->value;

        if ($request->isMethod('post')) {

            $data = $request->all();

            $claim = new UserRewardCliam();
            $claim->user_id = $user_id;
            $claim->get_reward = $user_detail->base_reward_token;
            $claim->claim_on = $cur_time;
            $claim->next_claim_after = $timer_time;
            $claim->save();

            $new_exp = intval($total_reward_count / $exp_on_claim->claims * $exp_on_claim->experiance);

            $new_level = intval($new_exp / $l_b_on_exp->experiance * $l_b_on_exp->level);
            $chk_cur_level = $cur_level + 1;

            if ($new_level == $chk_cur_level) {
                $new_per = $cur_base_reward_token / 100 * $l_b_on_exp->token_bonus;
                $new_base_reward_token = intval($cur_base_reward_token + $new_per);
            } else {
                $new_base_reward_token = intval($cur_base_reward_token);
            }

            $new_total_reward = $cur_total_reward + $cur_base_reward_token;

            // dd($cur_exp, $new_exp, $cur_level, $new_level, $cur_base_reward_token, $new_base_reward_token);

            UserDetail::where(['user_id' => $user_id])->update
            ([
                    'base_reward_token' => $new_base_reward_token,
                    'experiance' => $new_exp,
                    'level' => $new_level,
                    'total_reward' => $new_total_reward,
                ]);

            // referred by user ID
            $user_ref_by = Auth::user()->referred_by;

            if ($user_ref_by !== null && $user_ref_by !== '') {

                $ref_user_detail = UserDetail::where(['user_id' => $user_ref_by])->first();
                $ref_old_total_reward = $ref_user_detail->total_reward;

                $total_reward = $user_detail->base_reward_token;
                $ref_percentage = $ref_per->referral_percentage;

                $ref_per_rew = $total_reward / 100 * $ref_percentage;

                $new_reward_ref = $ref_old_total_reward + $ref_per_rew;

                UserDetail::where(['user_id' => $user_ref_by])->update
                ([
                        'total_reward' => $new_reward_ref
                    ]);

                $ref_com = new ReferralComission();
                $ref_com->referral_user_id = $user_id;
                $ref_com->referred_by_user_id = $user_ref_by;
                $ref_com->amount = $ref_per_rew;
                $ref_com->save();

            }

            return redirect()->back()->with('flash_message_success', 'Please wait till timer ends');

        }

        $cur_date = date('Y-m-d');
        $reward_count = UserRewardCliam::where(['user_id' => $user_id])->where('claim_on', 'LIKE', '%' . $cur_date . '%')->count();

        $reward_timer = UserRewardCliam::where(['user_id' => $user_id])->orderBy('id', 'desc')->first();

        // dd($reward_timer, $cur_time, $timer_time);

        return view('user.faucet.faucet')->with(compact('timer', 'reward_timer', 'currency', 'cur_time', 'user_detail', 'per_day_limit', 'reward_count', 'cur_total'));

    }
}
