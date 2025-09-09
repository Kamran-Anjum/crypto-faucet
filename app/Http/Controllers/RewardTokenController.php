<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RewardToken;

class RewardTokenController extends Controller
{
    public function editRewardToken(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            RewardToken::where(['id' => 1])->update
            ([
                    'tokens' => $data['tokens'],
                ]);

            return redirect()->back()->with('flash_message_success', 'Reward Toekn Updated Successfully!');
        }

        $reward_token = RewardToken::where(['id' => 1])->first();

        return view('admin.reward-token.edit-reward-token')->with(compact('reward_token'));

    }
}
