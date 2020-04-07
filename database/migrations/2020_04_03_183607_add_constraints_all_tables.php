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
            $table->foreign('companies')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('customer')->references('id')->on('customers')->onDelete('cascade');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('original_quote')->references('id')->on('quotes')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

        Schema::table('invoices_items', function (Blueprint $table) {
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('services_products')->onDelete('cascade');
        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

        Schema::table('quotes_items', function (Blueprint $table) {
            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('services_products')->onDelete('cascade');
        });

        Schema::table('services_products', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['companies']);
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['company']);

        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['customer']);

        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['original_quote','company_id','customer_id']);

        });

        Schema::table('invoices_items', function (Blueprint $table) {
            $table->dropForeign(['invoice_id','item_id']);

        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->dropForeign(['company_id','customer_id']);

        });

        Schema::table('quotes_items', function (Blueprint $table) {
            $table->dropForeign(['quote_id','item_id']);

        });

        Schema::table('services_products', function (Blueprint $table) {
            $table->dropForeign(['company_id']);

        });

        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

        });
    }
}
