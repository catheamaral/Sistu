<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome');
            $table->string('cpf');
            $table->string('rg');
            $table->date('data_nascimento');
            $table->string('endereco');
            $table->string('complemento')->nullable();

            $table->unsignedInteger('perfil_id');
            $table->foreign('perfil_id')->references('id')->on('perfil');

            $table->unsignedInteger('area_atuacao_id');
            $table->foreign('area_atuacao_id')->references('id')->on('area_atuacao');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario');
    }
}
