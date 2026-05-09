<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class TopUpController extends Controller
{
    // halaman form
    public function create()
    {
        $accounts = Account::where('user_id', auth()->id())->get();

        return view('topup.create', compact('accounts'));
    }

    // proses top up
    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required',
            'amount' => 'required|numeric|min:1000',
        ]);

        $account = Account::findOrFail($request->account_id);

        // tambah saldo
        $account->current_balance += $request->amount;

        $account->save();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Top up berhasil!');
    }
}