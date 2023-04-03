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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('company_id');
            $table->string('branch_id');
            $table->string('name');
            $table->string('contact_number');
            $table->string('type_of_charging');
            $table->string('type_of_fee');
            $table->string('address');
            $table->string('country');
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->integer('zip_code');
            $table->string('reference_number');
            $table->mediumInteger('user_id');
            $table->string('logo', 255)->nullable();
            $table->json('currency');
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
        Schema::dropIfExists('branches');
    }
};
