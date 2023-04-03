<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //change path into storage or s3
        $countrySqlPath = public_path('lib/countries.sql');
        $this->sqlSeeder($countrySqlPath);

        $stateSqlPath = public_path('lib/states.sql');
        $this->sqlSeeder($stateSqlPath);

        $citySqlPath = public_path('lib/cities.sql');
        $this->sqlSeeder($citySqlPath);
    }

    private function sqlSeeder($sqlPath)
    {

        $sql = file_get_contents($sqlPath);
        $statements = array_filter(array_map('trim', explode(';', $sql)));

        foreach ($statements as $stmt) {
            DB::statement($stmt);
        }
    }
}