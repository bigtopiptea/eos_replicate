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
        Schema::create('monitorings', function (Blueprint $table) {
            $table->id();
            $table->integer('item_count');
            $table->json('process_data');
            $table->json('batch_upload');
            $table->string('status');
            $table->foreignId('user_id')->constrained('users');

//            $table->double('total_takeUp', 8, 5)->default(0.00);
//            $table->double('total_distribution', 8, 5)->default(0.00);
//            $table->double('gp_net', 8, 5)->default(0.00);
//            $table->double('total_hold', 8, 5)->default(0.00);
//            $table->double('total_distributed', 8, 5)->default(0.00);
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
        Schema::dropIfExists('monitorings');
    }
};
