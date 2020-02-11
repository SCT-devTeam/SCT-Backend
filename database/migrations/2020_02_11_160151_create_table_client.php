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
        Schema::create('client', function (Blueprint $table) {
            $table->bigIncrements('id_cli');
            $table->enum('type_cli',['Particulier','Professionnel']);
            $table->enum('statut_cli',['Prospect','Client','Archivé','Supprimé']);
            $table->date('date_cli');
            $table->string('nom_ccli');
            $table->integer('siret_cli');
            $table->string('TVA_intercom_cli');
            $table->integer('tel_cli');
            $table->string('mail_cli');
            $table->integer('num_rue_cli');
            $table->string('nom_rue_cli');
            $table->integer('cp_cli');
            $table->string('ville_cli');
            $table->string('note_cli',300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
