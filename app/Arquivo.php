<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
	protected $fillable = [

		'caminho_arquivo'
    	
    ];

    public function andamento()
    {
        return $this->belongsTo('App\Andamento');
    }
}
