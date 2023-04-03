<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           // BanksCondition::class,
            // TransactionTypeSeeder::class,
            // BillerCategorySeeder::class,
            // ProviderSeeeder::class,
            // AddressSeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            // APIAccessSeeder::class,
//            BranchSeeder::class,
            //BankSeeder::class,
        ]);
    }
}
