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
            $table->enum('legal_form', ['Micro-entreprise', 'SA', 'SAS', 'SARL', 'AE', 'EI', 'EIRL', 'EURL', 'SASU'])->nullable();
            $table->string('name');
            $table->integer('siret')->nullable();
            $table->string('email');
            $table->integer('phone')->nullable();
            $table->integer('street_number')->nullable();
            $table->string('street_name')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->integer('capital_in_cents')->nullable();
            $table->string('insurance')->nullable();
            $table->string('bban', 34)->nullable();
            $table->boolean('bban_anytmie')->nullable();
            $table->smallInteger('default_revive_delay_in_days')->nullable();
            $table->smallInteger('default_payment_delay_in_days')->nullable();
            $table->string('default_payment_terms')->nullable();
            $table->enum('default_payment_method', ['credit_cardbank_transfer', 'bank_check', 'cash', 'multiple->$this->nullable()']);
            $table->integer('default_down_payment_percentage')->nullable();
            $table->smallInteger('default_quote_validity_delay_in_days')->nullable();
            $table->string('default_quote_accepting_conditions')->nullable();
            $table->string('default_invoice_notice')->nullable();
            $table->string('default_quote_notice')->nullable();
            $table->string('notes', 500)->nullable();


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
