<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
   // protected $table="funcionario";

	protected $fillable = [

    	'nome',
    	'cpf',
    	'rg',
    	'data_nascimento',
    	'endereco',
    	'complemento',
    	'area_atuacao'
    	
    ];
}
