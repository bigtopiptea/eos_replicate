<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class APIAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::findOrFail('1');
        $user->tokens()->delete();
        $outbound = $user->createToken('outbound-api', ['maintenance:get'])->plainTextToken;
        $inbound = $user->createToken('inbound-api', ['maintenance:post,put'])->plainTextToken;

        $transOutbound = $user->createToken('transaction-outbound-api', ['transaction:get'])->plainTextToken;
        $transInbound = $user->createToken('transaction-inbound-api', ['transaction:post,put'])->plainTextToken;

        $user->tokens->where('name', 'outbound-api')->first()->update([
            'plaintoken'=> $outbound
        ]);

        $user->tokens->where('name', 'inbound-api')->first()->update([
            'plaintoken'=> $inbound
        ]);

        $user->tokens->where('name', 'transaction-outbound-api')->first()->update([
            'plaintoken'=> $transOutbound
        ]);

        $user->tokens->where('name', 'transaction-inbound-api')->first()->update([
            'plaintoken'=> $transInbound
        ]);

    }
}
