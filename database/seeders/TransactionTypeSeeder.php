<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Maintenance::create([
            'meta_id' => 'BP',
            'meta_name' => 'TRANSACTION_TYPE',
            'meta_value' => 'BILLS PAYMENT'
        ]);
        Maintenance::create([
            'meta_id' => 'DTD',
            'meta_name' => 'TRANSACTION_TYPE',
            'meta_value' => 'DOOR TO DOOR'
        ]);
        Maintenance::create([
            'meta_id' => 'OTC',
            'meta_name' => 'TRANSACTION_TYPE',
            'meta_value' => 'CASH PICKUP ANYWHERE'
        ]);
        Maintenance::create([
            'meta_id' => 'CBA',
            'meta_name' => 'TRANSACTION_TYPE',
            'meta_value' => 'CREDIT TO BANK ACCOUNT'
        ]);
    }
}