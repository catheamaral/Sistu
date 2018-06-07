<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('nome');
            $table->string('data_nascimento');

            $table->string('genitor');
            $table->string('contato_genitor');
            $table->string('cpf_genitor');
            $table->string('rg_genitor');

            $table->string('genitora');
            $table->string('contato_genitora');
            $table->string('cpf_genitora');
            $table->string('rg_genitora');

            $table->string('responsavel');
            $table->string('contato_responsavel');
            $table->string('cpf_responsavel');
            $table->string('rg_responsavel');

            $table->string('endereco');
            $table->string('complemento');
            $table->string('estado');
            $table->string('cidade');

            $table->string('denunciante');
            $table->string('contato_denunciante');
            $table->string('cpf_denunciante');
            $table->string('rg_denunciante');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa');
    }
}
