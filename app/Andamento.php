<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Andamento extends Model
{
    protected $fillable = [

    	'descricao',
    	'data_hora'
    	
    ];

   	public function arquivo()
    {
        return $this->hasMany('App\Arquivo');
    }

    public function registroAtendimento()
    {
        return $this->belongsTo('App\Registro_atendimento');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
