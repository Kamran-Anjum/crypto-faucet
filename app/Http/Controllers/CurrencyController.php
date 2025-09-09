<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Currency;
use App\Models\RewardToken;
use Monolog\Formatter\ElasticaFormatter;

class CurrencyController extends Controller
{
    public function addViewCurrency(Request $request)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            $currency_count = Currency::where(['currency' => $data['currency']])->count();

            if ($currency_count == 0) {

                $currency = new Currency();
                $currency->currency = $data['currency'];
                $currency->value = $data['value'];
                $currency->per_token = $data['per_token'];
                $currency->save();

                return redirect()->back()->with('flash_message_success', $data['currency'] . ' Currency Added Successfully!');

            } else {

                return redirect()->back()->with('flash_message_success', $data['currency'] . ' Currency Already Added');

            }

        }

        $currency = Currency::orderBy('id', 'desc')->get();

        $reward_token = RewardToken::first();

        return view('admin.currency.add-view-currency')->with(compact('currency', 'reward_token'));

    }

    public function editCurrency(Request $request, $id)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();

            Currency::where(['id' => $id])->update
            ([
                    'currency' => $data['currency'],
                    'value' => $data['value'],
                    'per_token' => $data['per_token'],
                ]);

            return redirect('/admin/currencies')->with('flash_message_success', $data['currency'] . ' Currency Updated Successfully!');
        }

        $currency = Currency::where(['id' => $id])->first();

        return view('admin.currency.edit-currency')->with(compact('currency'));

    }

    public function deleteCurrency($id = null)
    {

        $get = Currency::where(['id' => $id])->first();
        $currency = $get->currency;

        Currency::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', $currency . ' Currency Deleted Successfully!');

    }
}
