<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('companies')->references('id')->on('companies');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('company')->references('id')->on('companies');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('customer')->references('id')->on('customers');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('original_quote')->references('id')->on('quotes');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('customer_id')->references('id')->on('customers');
        });

        Schema::table('invoices_items', function (Blueprint $table) {
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('item_id')->references('id')->on('services_products');
        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('customer_id')->references('id')->on('customers');
        });

        Schema::table('quotes_items', function (Blueprint $table) {
            $table->foreign('quote_id')->references('id')->on('quotes');
            $table->foreign('item_id')->references('id')->on('services_products');
        });

        Schema::table('services_products', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
