<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_contact', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('civilite_con',['Madame','Monsieur','Autres']);
            $table->string('nom_con');
            $table->string('prenom_con');
            $table->string('mail_con');
            $table->string('poste_con');
            $table->integer('num_tel_con');
            $table->integer('num_fixe_con');
            $table->integer('num_perso_con');
            $table->integer('num_fax_con');
            $table->string('note_con',300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_contact');
    }
}
