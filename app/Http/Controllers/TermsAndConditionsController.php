<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TermsAndCondition;

class TermsAndConditionsController extends Controller
{
    public function editTermsAndCondition(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            TermsAndCondition::where(['id'=>1])->update
            ([
                'title'=>$data['title'],
                'description'=>$data['description'],
            ]);

            return redirect()->back()->with('flash_message_success','Terms And Conditions Updated Successfully!');
        }

        $terms_conditions = TermsAndCondition::where(['id'=>1])->first();

        return view('admin.terms-and-conditions.edit-terms-and-conditions')->with(compact('terms_conditions'));

    }
}
