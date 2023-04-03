<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $providers = database_path('lib/providers.json');

        $results = json_decode(file_get_contents($providers), true);

        foreach ($results as $row) {
            Provider::create([
                'name' => strtoupper($row['Bank Name']),
                'code' => strtoupper($row['CODE']),
            ]);
        }
    }
}
