<?php

namespace App\Http\Controllers;

use App\Models\Account;

class DashboardController extends Controller
{
    public function index()
    {
        // menghitung total saldo
        $totalSaldo = Account::sum('current_balance');

        // kirim ke view
        return view('dashboard', compact('totalSaldo'));
    }
}