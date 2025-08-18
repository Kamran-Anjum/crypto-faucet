<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SetReward;

class SetRewardController extends Controller
{
    public function editSetReward(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            SetReward::where(['id'=>1])->update
            ([
                'reward_on'=>$data['reward_on'],
                'reward_value'=>$data['reward_value'],
                'currency'=>$data['currency'],
            ]);

            return redirect()->back()->with('flash_message_success','Privacy Policy Updated Successfully!');
        }

        $set_reward = SetReward::where(['id'=>1])->first();

        return view('admin.set-reward.edit-set-reward')->with(compact('set_reward'));

    }
}
