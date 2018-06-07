<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    //protected $table="pessoa";

	protected $fillable = [

		'nome',
		'data_nascimento',
		'genitor'
		'genitora',
		'responsavel',
		'contato_genitor',
		'contato_genitora',
		'contato_responsavel',
		'endereco',
		'complemento',
		'estado',
		'cidade'
    	
    ];

}
