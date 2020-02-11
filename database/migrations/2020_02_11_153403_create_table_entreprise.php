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
        Schema::create('entreprise', function (Blueprint $table) {
                $table->bigIncrements('id_entreprise');
                $table->enum('type_ent',['Micro-entreprise','SA','SAS','SARL','AE','EI','EIRL','EURL','SASU']);
                $table->string('nom_ent');
                $table->integer('siret_ent');
                $table->string('mail_ent');
                $table->integer('num_ent');
                $table->integer('num_rue_ent');
                $table->string('nom_rue_ent');
                $table->integer('cp_ent');
                $table->string('ville_ent');
                $table->string('note_ent',500);
                $table->string('condi_payement_fact');
                $table->string('condi_accept_devis');
                $table->string('notice_fac_ent');
                $table->string('notice_devis_ent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprise');
    }
}
