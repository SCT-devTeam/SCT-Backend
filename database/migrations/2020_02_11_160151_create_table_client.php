<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('customer_type',['individual','professional'])->nullable();
            $table->enum('status',['prospect','active','achived','deleted'])->nullable();
            $table->date('meeting_date')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('siret')->nullable();
            $table->string('tva_number')->nullable();
            $table->string('firstname',100)->nullable();
            $table->string('lastname',100)->nullable();
            $table->integer('street_number')->nullable();
            $table->string('street_name')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('note',300)->nullable();
            $table->enum('default_payment_method',['credit_cardbank_transfer','bank_check','cash','multiple'])->nullable();
            $table->unsignedBigInteger('company');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
