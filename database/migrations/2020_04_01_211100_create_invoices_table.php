<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('customer_id');
            $table->enum('qualification', ['edited', 'awaiting_payment', 'overdue', 'revived', 'disputed', 'legal_proceedings', 'promise', 'paid', 'cashed'])->nullable();
            $table->date('edition_date')->nullable();
            $table->date('payment_date')->nullable();
            $table->smallInteger('payment_delay_in_days')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('notice')->nullable();
            $table->enum('payment_method', ['credit_cardbank_transfer', 'bank_check', 'cash', 'multiple'])->nullable();
            $table->date('sending_date')->nullable();
            $table->date('revived_date')->nullable();
            $table->date('last_qualification_date')->nullable();
            $table->date('chasing_date')->nullable();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('original_quote');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
