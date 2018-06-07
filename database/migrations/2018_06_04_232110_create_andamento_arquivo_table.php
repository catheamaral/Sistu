<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAndamentoArquivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('andamento_arquivo', function (Blueprint $table) {
            

            $table->unsignedInteger('andamento_id');
            $table->foreign('andamento_id')->references('id')->on('andamento');

            $table->unsignedInteger('arquivo_id');
            $table->foreign('arquivo_id')->references('id')->on('arquivo');

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
        Schema::dropIfExists('andamento_arquivo');
    }
}
