<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEntreprise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
                $table->bigIncrements('company_id');
                $table->enum('legal_form',['Micro-entreprise','SA','SAS','SARL','AE','EI','EIRL','EURL','SASU']);
                $table->string('name');
                $table->integer('siret');
                $table->string('email');
                $table->integer('phone');
                $table->integer('street_number');
                $table->string('street_name');
                $table->integer('zipcode');
                $table->string('town');
                $table->string('notes',500);
                $table->string('default_invoice_payment_terms');
                $table->string('default_quote_accepting_conditions');
                $table->string('default_invoice_notice');
                $table->string('default_quote_notice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
