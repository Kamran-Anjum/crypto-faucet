<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExchangeTokenLimit;

class ExchangeTokenLimitController extends Controller
{
    public function editExchangeTokenLimit(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            ExchangeTokenLimit::where(['id'=>1])->update
            ([
                'exchange_token_limit'=>$data['exchange_token_limit'],
            ]);

            return redirect()->back()->with('flash_message_success','Exchange Token Limit Updated Successfully!');
        }

        $exchange_token_limit = ExchangeTokenLimit::where(['id'=>1])->first();

        return view('admin.exchange-token-limit.edit-exchange-token-limit')->with(compact('exchange_token_limit'));

    }
}
