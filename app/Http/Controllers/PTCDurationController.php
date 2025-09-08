<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PtcDuration;

class PTCDurationController extends Controller
{
    public function viewPtcDuration()
    {
        $ptc_durations = PtcDuration::orderBy('id', 'desc')->get();

        return view('admin.ptc-duration.view-ptc-duration')->with(compact('ptc_durations'));
    }

    public function addPtcDuration(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            $ptc_durations = new PtcDuration();
            $ptc_durations->seconds = $data['seconds'];
            $ptc_durations->tokens_take_per_view = $data['tokens_take_per_view'];
            $ptc_durations->tokens_give_per_view = $data['tokens_give_per_view'];
            $ptc_durations->save();

            return redirect('/admin/view-ptc-durations')->with('flash_message_success', 'PTC Duration Added Successfully!');

        }

        return view('admin.ptc-duration.add-ptc-duration');

    }

    public function editPtcDuration(Request $request, $id)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            PtcDuration::where(['id' => $id])->update
            ([
                    'seconds' => $data['seconds'],
                    'tokens_take_per_view' => $data['tokens_take_per_view'],
                    'tokens_give_per_view' => $data['tokens_give_per_view'],
                    'isActive' => $data['isActive'],
                ]);

            return redirect('/admin/view-ptc-durations')->with('flash_message_success', 'PTC Duration Updated Successfully!');
        }

        $ptc_duration = PtcDuration::where(['id' => $id])->first();

        return view('admin.ptc-duration.edit-ptc-duration')->with(compact('ptc_duration'));

    }

    public function deletePtcDuration($id = null)
    {

        PtcDuration::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', 'PTC Duration Deleted Successfully!');

    }
}
