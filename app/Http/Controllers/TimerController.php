<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Timer;

class TimerController extends Controller
{
    public function editTimer(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            Timer::where(['id'=>1])->update
            ([
                'timer_in_mint'=>$data['timer_in_mint'],
            ]);

            return redirect()->back()->with('flash_message_success','Timer Updated Successfully!');
        }

        $timer = Timer::where(['id'=>1])->first();

        return view('admin.timer.edit-timer')->with(compact('timer'));

    }
}
