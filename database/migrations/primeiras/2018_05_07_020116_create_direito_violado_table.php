*<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireitoVioladoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direito_violado', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('vida');
            $table->boolean('saude');
            $table->boolean('liberdade');
            $table->boolean('respeito');
            $table->boolean('dignidade');
            $table->boolean('familiar');
            $table->boolean('comunitario');
            $table->boolean('educacao');
            $table->boolean('cultura');
            $table->boolean('esporte');
            $table->boolean('lazer');
            $table->boolean('profissional');
            $table->boolean('protecao_no_trabalho');
            $table->text('observacao', 500)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direito_violado');
    }
}
