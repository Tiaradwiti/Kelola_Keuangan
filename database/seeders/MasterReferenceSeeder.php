<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterReferenceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('account_types')->insert([
            ['code' => 'cash', 'name' => 'Cash', 'description' => 'Uang tunai'],
            ['code' => 'bank', 'name' => 'Bank', 'description' => 'Rekening bank'],
            ['code' => 'e_wallet', 'name' => 'E-Wallet', 'description' => 'Dompet digital'],
            ['code' => 'cashless', 'name' => 'Cashless', 'description' => 'Penyimpanan non-tunai'],
        ]);

        DB::table('transaction_types')->insert([
            ['code' => 'income', 'name' => 'Income'],
            ['code' => 'expense', 'name' => 'Expense'],
            ['code' => 'transfer', 'name' => 'Transfer'],
            ['code' => 'adjustment', 'name' => 'Adjustment'],
        ]);

        DB::table('income_types')->insert([
            ['code' => 'active', 'name' => 'Active'],
            ['code' => 'passive', 'name' => 'Passive'],
        ]);

        DB::table('need_levels')->insert([
            ['code' => 'primer', 'name' => 'Primer', 'sort_order' => 1],
            ['code' => 'sekunder', 'name' => 'Sekunder', 'sort_order' => 2],
            ['code' => 'tersier', 'name' => 'Tersier', 'sort_order' => 3],
        ]);
    }
}
