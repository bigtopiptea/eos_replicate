<?php

namespace Database\Seeders;

use App\Models\BanksValidation;
use App\Models\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BanksCondition extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banksCondition = database_path('lib/banks_condition.json');

        $results = json_decode(file_get_contents($banksCondition), true);

        BanksValidation::create([
            'bank_validation' => json_encode($results['Banks']),

        ]);

    }
}
