<?php

namespace App\Http\Controllers;

use App\Models\TopUp;
use App\Models\User;
use App\Models\WithDrawal;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function bank(Request $request)
    {
        $action = $request->action;
        $sender_user_name = "Bank";
        $receiver_user_id = $request->receiver_id;
        $nominal = $request->nominal;
        $status = 'Selesai';
        $receiver_user = User::find($receiver_user_id);

        if ($action == 'topup') {
            $nomor = 'TopUp' . '-' . $receiver_user_id . '-' . $sender_user_name . '-' . now()->format('YmdHis');

            TopUp::create([
                'sender_user_name' => $sender_user_name,
                'user_id' => $receiver_user_id,
                'nominal' => $nominal,
                'status' => $status,
                'nomor' => $nomor,
            ]);

            $balance_receiver_user_now = $receiver_user->balance + $nominal;

            $receiver_user->update([
                'balance' => $balance_receiver_user_now
            ]);

            return redirect()->route('dashboard')->with('status', 'Top Up Berhasil');
        }

        if ($action == 'withdrawal') {
            if ($receiver_user->balance < $nominal) {
                return redirect()->route('dashboard')->with('status', 'Saldo lebih kecil');
            } else {
                $nomor = 'WithDrawal' . '-' . $receiver_user_id . '-' . $sender_user_name . '-' . now()->format('YmdHis');

                WithDrawal::create([
                    'sender_user_name' => $sender_user_name,
                    'user_id' => $receiver_user_id,
                    'nominal' => $nominal,
                    'status' => $status,
                    'nomor' => $nomor,
                ]);

                $balance_receiver_user_now = $receiver_user->balance - $nominal;

                $receiver_user->update([
                    'balance' => $balance_receiver_user_now
                ]);

                return redirect()->route('dashboard')->with('status', 'Tarik Tunai Berhasil');
            }
        }
    }

    public function bankTopUp(Request $request)
    {
        $action = $request->action;
        $topup_id = $request->topup_id;
        $receiver_user_id = $request->receiver_user_id;
        $topup = TopUp::find($topup_id);

        if ($action == 'terimatopup') {
            $status = 'Selesai';

            $topup->update([
                'status' => $status
            ]);

            $receiver_user = User::find($receiver_user_id);
            $balance_receiver_user_now = $receiver_user->balance + $topup->nominal;

            $receiver_user->update([
                'balance' => $balance_receiver_user_now
            ]);

            return redirect()->route('dashboard')->with('status', 'Menerima keinginan top up');
        }

        if ($action == 'tolaktopup') {
            $status = 'Ditolak';

            $topup->update([
                'status' => $status
            ]);

            return redirect()->route('dashboard')->with('status', 'Menolak keinginan top up');
        }
    }

    public function bankWithDrawal(Request $request)
    {
        $action = $request->action;
        $withdrawal_id = $request->withdrawal_id;
        $receiver_user_id = $request->receiver_user_id;
        $withdrawal = WithDrawal::find($withdrawal_id);

        if ($action == 'terimawithdrawal') {
            $status = 'Selesai';

            $withdrawal->update([
                'status' => $status
            ]);

            $receiver_user = User::find($receiver_user_id);
            $balance_receiver_user_now = $receiver_user->balance - $withdrawal->nominal;

            $receiver_user->update([
                'balance' => $balance_receiver_user_now
            ]);

            return redirect()->route('dashboard')->with('status', 'Menerima keinginan tarik tunai');
        }

        if ($action == 'tolakwithdrawal') {
            $status = 'Ditolak';

            $withdrawal->update([
                'status' => $status
            ]);

            return redirect()->route('dashboard')->with('status', 'Menolak keinginan tarik tunai');
        }
    }
}
