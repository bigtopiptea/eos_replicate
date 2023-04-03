<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            "company_id" => 1,
            "name" => "Shaw BLVD",
            'type_of_charging' => 'add',
            "contact_number" => "09102441441",
            "address" => "SHAW BLVD",
            "country" => 174,
            "region" => 1304,
            "province" => 1337,
            "city" =>    81134,
            "zip_code" => 1630,
            "reference_number" => "ABC1230910142023",
            "logo" => "borgir1675733642.png",
            "currency" => [],
        ]);
    }
}
