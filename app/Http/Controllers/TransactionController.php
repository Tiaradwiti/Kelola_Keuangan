<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function create()
    {
        return view('transactions.create');
    }
    public function index()
{
    $transactions = Transaction::latest()->get();

    return view('transactions.index', compact('transactions'));
}
public function destroy($id)
{
    $transaction = Transaction::findOrFail($id);

    // kurangi saldo akun jika transaksi dihapus
    if ($transaction->account) {
        $transaction->account->current_balance -= $transaction->amount;
        $transaction->account->save();
    }

    // hapus transaksi
    $transaction->delete();

    return redirect()
        ->route('transactions.index')
        ->with('success', 'Transaksi berhasil dihapus!');
}
}

