<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PtcInterval;

class PTCIntervalController extends Controller
{
    public function viewPtcInterval()
    {
        $ptc_intervals = PtcInterval::orderBy('id', 'desc')->get();

        return view('admin.ptc-interval.view-ptc-interval')->with(compact('ptc_intervals'));
    }

    public function addPtcInterval(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            $ptc_Intervals = new PtcInterval();
            $ptc_Intervals->duration = $data['duration'];
            $ptc_Intervals->type = $data['type'];
            $ptc_Intervals->save();

            return redirect('/admin/view-ptc-intervals')->with('flash_message_success', 'PTC Interval Added Successfully!');

        }

        return view('admin.ptc-interval.add-ptc-interval');

    }

    public function editPtcInterval(Request $request, $id)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            PtcInterval::where(['id' => $id])->update
            ([
                    'duration' => $data['duration'],
                    'type' => $data['type'],
                    'isActive' => $data['isActive'],
                ]);

            return redirect('/admin/view-ptc-intervals')->with('flash_message_success', 'PTC Interval Updated Successfully!');
        }

        $ptc_interval = PtcInterval::where(['id' => $id])->first();

        return view('admin.ptc-interval.edit-ptc-interval')->with(compact('ptc_interval'));

    }

    public function deletePtcInterval($id = null)
    {

        PtcInterval::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', 'PTC Interval Deleted Successfully!');

    }
}
