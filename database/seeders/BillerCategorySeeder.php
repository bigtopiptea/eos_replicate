<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $billerCategory = database_path('lib/biller_category.json');

        $results = json_decode(file_get_contents($billerCategory), true);

        $billsPayment = Maintenance::where('meta_id', 'BP')->first();

        foreach ($results as $row){
            Maintenance::create([
                'provider_id' => null,
                'meta_id' => $billsPayment->id,
                'meta_name' => 'BILLER_CATEGORY',
                'meta_value' => strtoupper($row['Biller Category']),
            ]);
        }
    }
}
