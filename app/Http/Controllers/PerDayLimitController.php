<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PerDayLimit;

class PerDayLimitController extends Controller
{
    public function editPerDayLimit(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            PerDayLimit::where(['id'=>1])->update
            ([
                'per_day_limit'=>$data['per_day_limit'],
            ]);

            return redirect()->back()->with('flash_message_success','Per Day Limit Updated Successfully!');
        }

        $per_day_limit = PerDayLimit::where(['id'=>1])->first();

        return view('admin.per-day-limit.edit-per-day-limit')->with(compact('per_day_limit'));

    }
}
