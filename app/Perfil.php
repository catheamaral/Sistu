<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //protected $table="perfil";

    protected $fillable = [

    	'descricao'
    	
    ];

    public function funcionario()
    {
        return $this->hasMany('App\Funcionario');
    }
}
