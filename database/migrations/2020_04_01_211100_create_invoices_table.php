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
            $table->integer('company_id');
            $table->integer('customer_id');
            $table->enum('qualification',['edited','awaiting_payment','overdue','revived','disputed','legal_proceedings','promise','paid','cashed']);
            $table->date('edition_date');
            $table->date('payment_date');
            $table->date('payment_date');
            $table->smallInteger('payment_delay_in_days');
            $table->string('payment_terms');
            $table->string('notice');
            $table->enum('payment_method',['credit_cardbank_transfer','bank_check','cash','multiple']);
            $table->date('sending_date');
            $table->date('revived_date');
            $table->date('last_qualification_date');
            $table->date('chasing_date');
            $table->string('note');
            $table->integer('original_quote');

            // Setup constraint
            $table->foreign('quotes')->references('id')->on('quotes');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('customer_id')->references('id')->on('customer');






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
