<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table="pessoa";

	protected $fillable = [

		'nome',
		'data_nascimento',
		'genitor',
		'contato_genitor',
		'cpf_genitor',
		'rg_genitor',
		'genitora',
		'contato_genitora',
		'cpf_genitora',
		'rg_genitora',
		'responsavel',
		'contato_responsavel',
		'cpf_responsavel',
		'rg_responsavel',
		'endereco',
		'complemento',
		'estado',
		'cidade',
		'denunciante',
    	'contato_denunciante',
    	'cpf_denunciante',
    	'rg_denunciante',
    	'oriDenuncia',
    	'LocalOcorrencia'
    ];

    public function registroAtendimento()
    {
        return $this->hasMany('App\Registro_atendimento');
    }

}
