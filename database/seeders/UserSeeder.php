<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'admin',
            'user_name' => 'OERI_JOEREN',
            'first_name' => 'Joeren',
            'last_name' => 'Dupaya',
            'middle_name' => 'Tito',
            'suffix' => 'Mr.',
            'mobile_number' => '09101112233',
            'email' => 'dccoc12@gmail.com',
            'password' => Hash::make('asdasd123'),
            'company_id' => 1,
            'branch_id' => 1,
            'status' => true,
            'is_online' => false,
            'email_verified_at' => date('Y-m-d h:i:s'),
        ]);

        DB::table('user_permissions')->insert([
            'user_id' => "1",
            'permissions' => collect([
                'Home',
                'Processing',
                'Status & Reversal',
                'Inquiry',
                'Amendments',
                'Monitoring',
                'Reports',
                'Branches',
                'Companies',
                'Users',
                "Other Services",
                'Others'
            ]),
        ]);


        User::create([
            'role' => 'maker',
            'user_name' => 'OERI_GEL',
            'first_name' => 'Angelou',
            'last_name' => 'Lemita',
            'middle_name' => 'Cruz',
            'suffix' => 'Mrs.',
            'mobile_number' => '09101112233',
            'email' => 'gel@gmail.com',
            'password' => Hash::make('asdasd123'),
            'company_id' => 1,
            'branch_id' => 1,
            'status' => true,
            'is_online' => false,
            'email_verified_at' => date('Y-m-d h:i:s'),
        ]);

        DB::table('user_permissions')->insert([
            'user_id' => "2",
            'permissions' => collect([
                "Login",
                "Dashboard",
                "Other Services",
                "File Upload",
                "Data Entry",
                "API",
                "Amend",
                "Status Inquiry (With Audit Trail)",
                "Tie-up\'s Inquiry",
                "Adjustment Entry",
                "Status Tagging",
                "Reversal (DTD Only)",
                "Upload USF",
                "Status Inquiry (with Audit Trail)",
                "View And Generate",
                "Data Entry",
                "Fees Management",
                "Rates Management",
                "Waive Charges",
                "Handling Fee",
                "Monitoring",
                "Processing",
                "Cancellation",
                "Additional",
                "Refund",
                "AP Voucher",
                "Funding From Tie-up",
                "Funding From Tie-up to OERI",
                "Funding From OERI to OERI",
                "Funding to Banks/Providers",
                "Buying",
                "Selling",
                "Inventory",
                "MOnitor",
                "ADjustment Entry",
                "Pushback",
                "UPload USF",
                "STatus Inquiry (With Audit Trail)",
                "VIew And Generate",
                "Billing (Statement Of Account)",
                "Collection (Payment Monitoring)",
                "Payable Request",
                "Print Receipt (AR/OR)",
                "ADJustment Entry",
                "VIEw And Generate",
                "Create Purchase Request",
                "Create Purchase Order",
                "Create Account Payable Request",
                "Create Journal Entry",
                "Inventory",
                "View SL",
                "Reconciliation Of Accounts",
                "Creditback Confirmation",
                "STAtus Inquiry (With Audit Trail)",
                "VIEW And Generate",
                "MONitor"
            ]),
        ]);
    }
}
