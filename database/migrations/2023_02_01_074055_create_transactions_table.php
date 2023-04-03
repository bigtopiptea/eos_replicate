<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Transaction;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id');
            $table->bigInteger('branch_id');
            $table->bigInteger('user_id'); //for eos processing
            //sophia details

            $table->string('uploader_id');
            $table->string('uploaded_by');
            $table->string('uploader_email');
            $table->enum('class', ['data-entry', 'bulk-upload']);
            // $table->string('company_id');

            $table->string('item_count')->nullable();
            $table->string('transaction_date')->nullable();

            $table->string('processing_type', 3)->nullable();
            //po1-processing,po2-amendment,po3-refund
            $table->string('reference_number', 50)->nullable(); //unique
            $table->string('amendment_reference_number', 50)->nullable(); //mandatory for po2 and po3 //unique
            $table->string('transaction_type')->nullable(); //3
            //t01-cba,t02-bp,t03-otc,t04-dtd
            $table->string('original_currency', 12)->nullable(); //in_currency - List of currencie
            $table->string('original_amount', 18)->nullable(); //in_amount
            $table->string('exchange_rate', 18)->nullable();
            $table->string('remittance_currency', 3)->nullable(); //OUT_currency - List of currencies
            $table->string('gross_amount', 18)->nullable(); //converted_amount
            $table->string('service_fee', 18)->nullable();

            $table->string('net_amount', 18)->nullable(); //OUT_amount

            $table->bigInteger('remitter_id');
            $table->bigInteger('beneficiary_id')->nullable();

            $table->string('bank_name')->nullable(); //if full name convert it into 5 letters.
            $table->string('bank_branch')->nullable(); //20
            $table->string('account_number', 20)->nullable();

            $table->string('instruction_1')->nullable();
            $table->string('instruction_2')->nullable();
            $table->string('instruction_3')->nullable();
            $table->string('good_value_date')->nullable();

            $table->enum('status', Transaction::getTransactionStatuses())->nullable();
            $table->string('path')->nullable();
            $table->string('batch_number')->nullable();
            $table->integer('eos_batch_id');
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
        Schema::dropIfExists('transactions');
    }
};
