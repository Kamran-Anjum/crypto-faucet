<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SetReward;
use App\Models\RewardToken;

class SetRewardController extends Controller
{
    public function editSetReward(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            SetReward::where(['id' => 1])->update
            ([
                    'reward_on' => $data['reward_on'],
                    'reward_value' => $data['reward_value'],
                    'currency' => $data['currency'],
                ]);

            RewardToken::where(['id' => 1])->update
            ([
                    'tokens' => $data['tokens'],
                ]);

            return redirect()->back()->with('flash_message_success', 'Updated Successfully!');
        }

        $reward_token = RewardToken::where(['id' => 1])->first();

        $set_reward = SetReward::where(['id' => 1])->first();

        return view('admin.set-reward.edit-set-reward')->with(compact('reward_token', 'set_reward'));

    }
}
