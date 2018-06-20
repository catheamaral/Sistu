<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenteVioladorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agente_violador', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('Estado');
            $table->boolean('Sociedade');
            $table->boolean('Pais');
            $table->boolean('respon');
            $table->boolean('Propria');
            $table->text('pro2', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agente_violador');
    }
}
