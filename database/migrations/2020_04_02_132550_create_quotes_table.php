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
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('customer_id');
            $table->enum('qualification', ['draft', 'edited', 'awaiting_approuval', 'revived', 'accepted', 'declined', 'discontinued'])->nullable();
            $table->date('edition_date')->nullable();
            $table->smallInteger('validity_delay_in_days')->nullable();
            $table->smallInteger('payment_delay_in_days')->nullable();
            $table->string('payment_terms')->nullable();
            $table->enum('payment_method', ['credit_cardbank_transfer', 'bank_check', 'cash', 'multiple'])->nullable();
            $table->integer('down_payment_percentage')->nullable();
            $table->string('notice')->nullable();
            $table->string('accepting_conditions')->nullable();
            $table->date('sending_date')->nullable();
            $table->date('revived_date')->nullable();
            $table->date('last_qualification_date')->nullable();

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
