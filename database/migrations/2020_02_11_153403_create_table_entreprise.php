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
                $table->bigIncrements('id');
                $table->enum('legal_form',['Micro-entreprise','SA','SAS','SARL','AE','EI','EIRL','EURL','SASU']);
                $table->string('name');
                $table->integer('siret');
                $table->string('email');
                $table->integer('phone');
                $table->integer('street_number');
                $table->string('street_name');
                $table->integer('zipcode');
                $table->string('city');
                $table->integer('capital_in_cents');
                $table->string('insurance');
                $table->string('bban',34);
                $table->boolean('bban_anytmie');
                $table->smallInteger('default_revive_delay_in_days');
                $table->smallInteger('default_payment_delay_in_days');
                $table->string('default_payment_terms');
                $table->enum('default_payment_method', ['credit_cardbank_transfer','bank_check','cash','multiple']);
                $table->integer('default_down_payment_percentage');
                $table->smallInteger('default_quote_validity_delay_in_days');
                $table->string('default_quote_accepting_conditions');
                $table->string('default_invoice_notice');
                $table->string('default_quote_notice');
                $table->string('notes',500);
                $table->unsignedBigInteger('customer');

                // mise en place de la contrainte sur la table
                $table->foreign('customer')->references('id')->on('customers');

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
