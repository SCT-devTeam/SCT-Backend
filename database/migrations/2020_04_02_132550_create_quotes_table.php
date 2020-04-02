<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->integer('customer_id');
            $table->enum('qualification',['draft','edited','awaiting_approuval','revived','accepted','declined','discontinued']);
            $table->date('edition_date');
            $table->smallInteger('validity_delay_in_days');
            $table->smallInteger('payment_delay_in_days');
            $table->string('payment_terms');
            $table->enum('payment_method',['credit_cardbank_transfer','bank_check','cash','multiple']);
            $table->integer('down_payment_percentage');
            $table->string('notice');
            $table->string('accepting_conditions');
            $table->date('sending_date');
            $table->date('revived_date');
            $table->date('last_qualification_date');

            //setup constraint
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('customer_id')->references('id')->on('customers');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
