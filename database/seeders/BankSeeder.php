<?php

namespace Database\Seeders;

use App\Models\Biller;
use App\Models\Maintenance;
use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = database_path('lib/banks.json');

        $results = json_decode(file_get_contents($banks), true);

        $providerId = Provider::where('id', 1)->first();

        foreach ($results as $row) {


            $biller = Biller::create([
                'biller_category_id' => 4,
                'transaction_type_id' => 4,
                'payment_type' => 'none',
                'amount_range' => json_encode([]),
                'name' => strtoupper($row['BANK NAME']),
                'provider_id' => $providerId->id,
                'fields' => json_encode([]),
            ]);
            Maintenance::create([
                'meta_id' => strtoupper($row['BANK CODE']),
                'meta_name' => 'CBA',
                'meta_value' => $biller->id,
                'provider_id' => $providerId->id,
            ]);
        }
    }
}
