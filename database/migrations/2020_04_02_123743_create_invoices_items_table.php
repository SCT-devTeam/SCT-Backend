<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer(('invoice_id'));
            $table->enum('item_type',['product','service']);
            $table->integer('item_id');
            $table->string('label',100);
            $table->string('description');
            $table->integer('pre_vat_price_in_cents');
            $table->integer('var_rate');
            $table->integer('quantity');

            //setup constraint
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices_items');
    }
}
