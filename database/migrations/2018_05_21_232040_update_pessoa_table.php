<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pessoa', function (Blueprint $table) {
            $table->string('nome', 60); 
            $table->string('genitor', 60); 
            $table->string('genitora', 60); 
            $table->string('responsavel', 60);
            $table->date('data_nascimento');
            $table->string('cpf_genitor', 11);
            $table->string('cpf_genitora', 11);
            $table->string('cpf_responsavel', 11); 
            $table->string('contato_genitor', 10); 
            $table->string('contato_genitora', 10); 
            $table->string('contato_responsavel', 10); 
            $table->string('endereco', 45);
            $table->string('complemento', 45);
            $table->string('estado', 10);
            $table->string('cidade', 10);
            $table->string('ori_denuncia');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pessoa', function (Blueprint $table) {
            
            $table->dropColumn('nome', 60); 
            $table->dropColumn('genitor', 60); 
            $table->dropColumn('genitora', 60); 
            $table->dropColumn('responsavel', 60);
            $table->dropColumn('data_nascimento');
            $table->dropColumn('cpf_genitor', 11);
            $table->dropColumn('cpf_genitora', 11);
            $table->dropColumn('cpf_responsavel', 11); 
            $table->dropColumn('contato_genitor', 10); 
            $table->dropColumn('contato_genitora', 10); 
            $table->dropColumn('contato_responsavel', 10); 
            $table->dropColumn('endereco', 45);
            $table->dropColumn('complemento', 45);
            $table->dropColumn('estado', 10);
            $table->dropColumn('cidade', 10);
            $table->dropColumn('ori_denuncia');
        });
    }
}
