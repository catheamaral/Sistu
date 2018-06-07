<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroAtendimentoDireitoViolado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registroAtend_direitoViolado', function (Blueprint $table) {
            
            $table->unsignedInteger('registro_atendimento_id');
            $table->foreign('registro_atendimento_id')->references('id')->on('registro_atendimento');

            $table->unsignedInterger('direito_violado_id');
            4table->foreign('direito_violado_id')->references('id')->on('direito_violado');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registroAtend_direitoViolado');
    }
}
