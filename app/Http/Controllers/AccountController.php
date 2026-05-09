<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountType;

class AccountController extends Controller
{
    // halaman form
  public function create()
{
    $accountTypes = AccountType::all();

    return view('accounts.create', compact('accountTypes'));
}
    // simpan akun
 public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:100',
        'account_type_id' => 'required',
        'initial_balance' => 'required|numeric|min:0',
    ]);

    Account::create([
        'user_id' => auth()->id(),
        'account_type_id' => $request->account_type_id,
        'name' => $request->name,
        'initial_balance' => $request->initial_balance,
        'current_balance' => $request->initial_balance,
        'currency_code' => 'IDR',
        'is_active' => true,
    ]);

    return redirect()
        ->route('dashboard')
        ->with('success', 'Akun berhasil dibuat!');
}
}