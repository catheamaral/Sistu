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

    public function perfil()
    {
        return $this->belongsTo('App\Perfil');
    }

    public function registroAtendimento()
    {
        return $this->hasMany('App\Registro_atendimento');
    }

    public function areaAtuacao()
    {
        return $this->belongsTo('App\AreaAtuacao');
    }
}
