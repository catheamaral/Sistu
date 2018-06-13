<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('descricao');
            
        });

        DB::table('perfil')->insert(
            array(
                'id' => 1,
                'descricao' => 'Atendente'
            )
        );
        DB::table('perfil')->insert(
            array(
                'id' => 2,
                'descricao' => 'Conselheiro Tutelar'
            )
        );
        DB::table('perfil')->insert(
            array(
                'id' => 3,
                'descricao' => 'Administrador'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfil');
    }
}
