<?php

namespace App\Http\Controllers;

use App\Models\ExperianceOnClaim;
use Illuminate\Http\Request;

class ExperianceOnClaimController extends Controller
{
    public function editExperianceOnClaim(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            ExperianceOnClaim::where(['id' => 1])->update
            ([
                    'claims' => $data['claims'],
                    'experiance' => $data['experiance'],
                ]);

            return redirect()->back()->with('flash_message_success', 'Experiance On Claim Updated Successfully!');
        }

        $exp_on_claim = ExperianceOnClaim::where(['id' => 1])->first();

        return view('admin.experiance-on-claim.edit-experiance-on-claim')->with(compact('exp_on_claim'));

    }
}
