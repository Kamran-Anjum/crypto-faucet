<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Withdrawal;
use App\Models\UserDetail;
use App\Models\SetReward;
use App\Services\FaucetPayService;

class WithdrawalController extends Controller
{
    // show to admin
    public function viewWithdrawal()
    {

        $withdrawals = DB::table('withdrawals as w')
            ->join('users as u', 'w.user_id', '=', 'u.id')
            ->select('w.*', 'u.name as userName')
            ->orderBy('w.id', 'desc')
            ->get();

        return view('admin.withdrawal.view-withdrawal', compact('withdrawals'));

    }
    // user withdrawal page
    public function withdrawal(Request $request, FaucetPayService $faucetPay)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $user_detail = UserDetail::where(['user_id' => $user_id])->first();
        $cur_total_tokens = $user_detail->total_reward;

        if ($request->isMethod('post')) {

            $data = $request->all();

            // Save withdrawal request first
            $withdrawal = Withdrawal::create([
                'user_id' => $user_id,
                'address' => $data['address'],
                'amount' => $data['amount'],
                'currency' => $data['currency'],
                'status' => 'pending',
            ]);

            // Call FaucetPay API
            $response = $faucetPay->send($request->address, $request->amount, $request->currency);

            if (isset($response['status']) && $response['status'] == 200) {

                $withdrawal->update([
                    'status' => 'success',
                    'tx_id' => $response['payout_id'] ?? null, // FaucetPay transaction ID
                ]);

                $remaining_tokens = (int) $cur_total_tokens - (int) $data['tokens'];

                UserDetail::where(['user_id' => $user_id])->update
                ([
                        'total_reward' => $remaining_tokens,
                    ]);

                return back()->with('flash_message_success', 'Withdrawal sent successfully!');

            } else {

                $withdrawal->update([
                    'status' => 'failed',
                ]);

                return back()->with('flash_message_error', $response['message'] ?? 'Something went wrong!');
            }

            return redirect()->back()->with('flash_message_success', 'Withdrawal Successfully!');


        }

        $reward = SetReward::first();

        $old_total_reward = $user_detail->total_reward;

        $cur_total = $old_total_reward / $reward->reward_on * $reward->reward_value;

        $withdrawals = Withdrawal::where(['user_id' => $user_id])->orderBy('id', 'desc')->get();

        return view("user.withdrawal.withdrawal")->with(compact('user_detail', 'cur_total', 'withdrawals'));

    }

    public function userTokenToWithdrawal($token)
    {

        $reward = SetReward::first();

        $old_total_reward = $token;

        $amount = $old_total_reward / $reward->reward_on * $reward->reward_value;

        // $cur_total = rtrim(rtrim(sprintf('%.8F', $amount), '0'), '.');
        $cur_total = (int) ($amount * 100000000);

        return $cur_total;

    }
}
