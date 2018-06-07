<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaAtuacao extends Model
{
    
	protected $table = 'area_atuacao';

	protected $fillable = [

    	'descricao'
    	
    ];

    public function funcionario()
    {
        return $this->hasMany('App\Funcionario');
    }

}
