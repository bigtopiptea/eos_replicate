<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biller_category_id');
            $table->integer('transaction_type_id');
            $table->string('payment_type');
            $table->json('amount_range')->nullable();
            $table->string('name')->unique();
            $table->foreignId('provider_id')->unsigned()->constrained('providers');
            $table->json('fields');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billers');
    }
};
