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
            $table->bigIncrements('customer_id');
            $table->enum('customer_type',['Particulier','Professionnel']);
            $table->enum('status',['Prospect','Client','Archivé','Supprimé']);
            $table->date('meeting_date');
            $table->string('company_name');
            $table->integer('siret');
            $table->string('tva_number');
            $table->integer('phone');
            $table->string('email');
            $table->integer('street_number');
            $table->string('street_name');
            $table->integer('zipcode');
            $table->string('city');
            $table->string('note',300);
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
