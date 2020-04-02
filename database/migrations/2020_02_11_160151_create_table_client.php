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
            $table->enum('customer_type',['individual','professional']);
            $table->enum('status',['prospect','active','achived','deleted']);
            $table->date('meeting_date');
            $table->string('company_name');
            $table->integer('siret');
            $table->string('tva_number');
            $table->string('firstname',100);
            $table->string('lastname',100);
            $table->integer('street_number');
            $table->string('street_name');
            $table->integer('zipcode');
            $table->string('city');
            $table->string('note',300);
            $table->enum('default_payment_method',['credit_cardbank_transfer','bank_check','cash','multiple']);


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
