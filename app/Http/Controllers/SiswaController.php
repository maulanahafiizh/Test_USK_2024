<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\TopUp;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithDrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function siswa(Request $request)
    {
        $action = $request->action;
        $sender_user_name = 'Bank';
        $receiver_user_id = Auth::user()->id;
        $nominal = $request->nominal;
        $status = 'Proses';

        if ($action == 'topup') {
            $nomor = 'TopUp' . '-' . $receiver_user_id . '-' . $sender_user_name . '-' . now()->format('YmdHis');

            TopUp::create([
                'sender_user_name' => $sender_user_name,
                'user_id' => $receiver_user_id,
                'nominal' => $nominal,
                'status' => $status,
                'nomor' => $nomor,
            ]);

            return redirect()->route('dashboard')->with('status', 'Mengirimkan permintaan top up');
        }

        if ($action == 'withdrawal') {
            if (Auth::user()->balance < $nominal) {
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

                return redirect()->route('dashboard')->with('status', 'Mengirimkan permintaan tarik tunai');
            }
        }
    }

    public function lanjutProduk(Request $request)
    {
        $action = $request->action;
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;
        $nomor = 'Beli' . '-' . $product_id . '-' . $user_id . '-' . now()->format('YmdHis');
        $product_quantity = $request->product_quantity;
        $product_price = $request->product_price * $product_quantity;

        if ($action == 'beli') {
            if (Auth::user()->balance < $product_price) {
                return redirect()->route('dashboard')->with('status', 'Saldo kurang');
            } else {
                $status = 'Belum Bayar';

                Transaction::create([
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'status' => $status,
                    'nomor' => $nomor,
                    'price' => $product_price,
                    'quantity' => $product_quantity,
                ]);

                return redirect()->route('confirmbuy');
            }
        }

        if ($action == 'keranjang') {
            $status = 'Keranjang';

            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'status' => $status,
                'price' => $product_price,
                'quantity' => $product_quantity,
            ]);

            return redirect()->route('dashboard')->with('status', 'Menambahkan keranjang');
        }
    }

    public function confirmBuy()
    {
        $transaction = Transaction::where('status', 'Belum Bayar')->first();

        return view('roles.siswa.konfirmasi-transaksi', compact('transaction'));
    }

    public function tidakJadi(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('dashboard');
    }

    public function bayarTransaksi(Request $request)
    {
        $transaction_id = $request->transaction_id;
        $transaction = Transaction::find($transaction_id);
        $product = $transaction->product;
        $product_stock_request = $transaction->quantity;
        $stock_now = $product->last_stock - $product_stock_request;
        $user_id = $transaction->user_id;
        $user = User::where('id', $user_id)->first();
        $saldo_user_now = $user->balance - $transaction->price;

        $product->update([
            'last_stock' => $stock_now,
        ]);

        $transaction->update([
            'status' => 'Terbayar',
        ]);

        $user->update([
            'balance' => $saldo_user_now,
        ]);

        return redirect()->route('dashboard')->with('status', 'Pembayaran selesai');
    }
}
