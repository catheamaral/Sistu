<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Idade implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $dt = strtotime($value);
                    
        $date = date("d/m/Y", $dt);
        list($dia, $mes, $ano) = explode('/', $date);

        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);


        if($idade<=18){ 
            return true;
        }else{ 
            return false;
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A Criança/Adolescente tem de ser menor de idade';
    }
}
