<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger(('quote_id'));
            $table->unsignedBigInteger('item_id');
            $table->string('label',100);
            $table->string('description');
            $table->integer('pre_vat_price_in_cents');
            $table->integer('var_rate');
            $table->integer('quantity');

            //setup constraint
            $table->foreign('quote_id')->references('id')->on('quotes');
            $table->foreign('item_id')->references('id')->on('services_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes_items');
    }
}
