<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'account_id',
        'transaction_type_id',
        'category_id',
        'amount',
        'transaction_date',
        'description',
        'reference_no',
        'source_account_id',
        'destination_account_id',
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
        'amount' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    // User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Account utama
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    // Tipe transaksi
    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }

    // Kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Akun sumber
    public function sourceAccount()
    {
        return $this->belongsTo(Account::class, 'source_account_id');
    }

    // Akun tujuan
    public function destinationAccount()
    {
        return $this->belongsTo(Account::class, 'destination_account_id');
    }
}