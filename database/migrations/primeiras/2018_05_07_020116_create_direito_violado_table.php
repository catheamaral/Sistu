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
            $table->boolean('freedom');
            $table->boolean('respect');
            $table->boolean('dig');
            $table->boolean('ConvF');
            $table->boolean('ConvComunitario');
            $table->boolean('educacao');
            $table->boolean('cultura');
            $table->boolean('esporte');
            $table->boolean('lazer');
            $table->boolean('profissa');
            $table->boolean('proTraba');
            $table->text('pro', 500)->nullable();

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
