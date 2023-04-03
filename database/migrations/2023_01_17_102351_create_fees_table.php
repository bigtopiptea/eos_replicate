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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('source', 10);
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('branch_id')->constrained('branches');
            $table->foreignId('biller_id')->constrained('billers');
            $table->json('amount_range')->nullable();
            $table->json('currency');
            $table->string('type_of_fee');
            $table->double('service_fee', 8, 2)->default(0.00);
            $table->double('amendment_fee', 8, 2)->default(0.00);
            $table->double('refund_fee', 8, 2)->default(0.00);
            $table->mediumInteger('last_updated_by');
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
        Schema::dropIfExists('fees');
    }
};
