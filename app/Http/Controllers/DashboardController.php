<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\TopUp;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithDrawal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->role == "Admin") {
            $user = User::all()->count();
            $allUsers = User::all();
            $product = Product::all()->count();
            $allProducts = Product::all();

            return view('dashboard', compact('user', 'allUsers', 'product', 'allProducts'));
        }

        if (auth()->user()->role == "Bank") {
            $costumers = User::where('role', 'Siswa')->orderBy('name', 'ASC')->get();
            $allRequestTopUps = TopUp::where('status', 'Proses')->orderBy('created_at', 'DESC')->get();
            $allRequestWithDrawals = WithDrawal::where('status', 'Proses')->orderBy('created_at', 'DESC')->get();

            return view('dashboard', compact('costumers', 'allRequestTopUps', 'allRequestWithDrawals'));
        }

        if (auth()->user()->role == "Toko") {
            $product = Product::all()->count();
            $allProducts = Product::all();
            $allTransactions = Transaction::where('status', 'Terbayar')->orderBy('created_at', 'DESC')->get();

            return view('dashboard', compact('product', 'allProducts', 'allTransactions'));
        }

        if (auth()->user()->role == "Siswa") {
            $allProducts = Product::all();
            $cart = Cart::all()->count();

            return view('dashboard', compact('allProducts', 'cart'));
        }
    }
}
