<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
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

    // tambah saldo akun
    $account->current_balance += $request->amount;

    $account->save();

    // simpan ke riwayat transaksi
    Transaction::create([
        'user_id' => auth()->id(),
        'account_id' => $account->id,
        'transaction_type_id' => 1,
        'category_id' => null,
        'amount' => $request->amount,
        'transaction_date' => now(),
        'description' => 'Top Up Saldo',
        'reference_no' => 'TOPUP-' . time(),
        'source_account_id' => null,
        'destination_account_id' => $account->id,
    ]);

    return redirect()
        ->route('transactions.index')
        ->with('success', 'Top up berhasil!');
}
}