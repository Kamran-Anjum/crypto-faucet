<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    public function editPrivacyPolicy(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            PrivacyPolicy::where(['id'=>1])->update
            ([
                'title'=>$data['title'],
                'description'=>$data['description'],
            ]);

            return redirect()->back()->with('flash_message_success','Privacy Policy Updated Successfully!');
        }

        $privacy_policy = PrivacyPolicy::where(['id'=>1])->first();

        return view('admin.privacy-policy.edit-privacy-policy')->with(compact('privacy_policy'));

    }
}
