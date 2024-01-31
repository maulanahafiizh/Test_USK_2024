<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function lanjutTransaksi(Request $request)
    {
        $action = $request->action;
        $transaction_id = $request->transaction_id;
        $transaction = Transaction::find($transaction_id);
        $user_id = $transaction->user_id;
        $user = User::where('id', $user_id)->first();

        if ($action == 'terima') {
            $status = 'Selesai';

            $transaction->update([
                'status' => $status
            ]);

            return redirect()->route('dashboard')->with('status', 'Transaksi selesai');
        }

        if ($action == 'gagal-balikin') {
            $status = 'Gagal';
            $saldo_user_now = $user->balance + $transaction->price;

            $transaction->update([
                'status' => $status
            ]);

            $user->update([
                'balance' => $saldo_user_now
            ]);

            return redirect()->route('dashboard')->with('status', 'Transaksi gagal');
        }   

        if ($action == 'gagal-gakbalikin') {
            $status = 'Gagal';

            $transaction->update([
                'status' => $status
            ]);

            return redirect()->route('dashboard')->with('status', 'Transaksi gagal');
        }
    }
}
