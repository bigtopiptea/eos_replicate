<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handling_fees', function (Blueprint $table) {
            $table->id();
            $table->string('tie_up');
            $table->integer('transaction_type_id');
            $table->integer('biller_id');
            $table->string('currency');
            $table->double('service_fee', 8, 4)->default(0.0000);
            $table->double('amendment_fee', 8, 4)->default(0.0000);
            $table->double('refund_fee', 8, 4)->default(0.0000);
            $table->integer('last_updated_by');
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
        Schema::dropIfExists('handling_fees');
    }
};
