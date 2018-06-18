<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro_atendimento extends Model
{
    protected $table="registro_atendimento";

    protected $fillable = [

        'local',
        'funcionario_id',
        'pessoa_id'
    	
    ];

    public function agente_violador(){
    	return $this->belongsToMany(Agente_violador::class);
    }

    public function direito_violado(){
    	return $this->belongsToMany(Direito_violado::class);
    }

    public function criador()
    {
        return $this->belongsTo('App\Funcionario');
    }

    public function pessoa()
    {
        return $this->belongsTo('App\Pessoa');
    }

    public function andamento()
    {
        return $this->hasMany('App\Andamento');
    }
}
