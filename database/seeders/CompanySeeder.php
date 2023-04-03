<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = database_path('lib/companies.json');

        $results = json_decode(file_get_contents($companies), true);

        foreach ($results as $row) {
            Company::create([
                'name' => strtoupper($row['name']),
                'partner_code' => strtoupper($row['partner_code']),
                'type_of_charging' => strtoupper($row['type_of_charging']),
                'added_by' => strtoupper($row['added_by']),
                'isActive' => 1,
            ]);
        }
    }
}
