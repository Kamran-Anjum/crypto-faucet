<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LevelBonusOnExperiance;

class LevelBonusOnExperianceController extends Controller
{
    public function editLevelBonusOnExperiance(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            LevelBonusOnExperiance::where(['id' => 1])->update
            ([
                    'experiance' => $data['experiance'],
                    'level' => $data['level'],
                    'token_bonus' => $data['token_bonus'],
                ]);

            return redirect()->back()->with('flash_message_success', 'Level Bonus On Experiance Updated Successfully!');
        }

        $level_bonus_on_exp = LevelBonusOnExperiance::where(['id' => 1])->first();

        return view('admin.level-bonus-on-experiance.edit-level-bonus-on-experiance')->with(compact('level_bonus_on_exp'));

    }
}
