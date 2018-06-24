<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   


        #####################  IDENTIFICANDO O USER

        $user = Auth::user()->perfil_id;
        
        $user_id = ((Auth::user()->id) -1);
        
        #####################
        
        $conselheiros = DB::table('funcionario')
            ->join('perfil', 'perfil.id', '=', 'funcionario.perfil_id')
            ->join('area_atuacao', 'area_atuacao.id', '=', 'funcionario.area_atuacao_id')
            ->select('funcionario.*', 'area_atuacao.atuacao', 'perfil.descricao')
            ->get();


        ############################################# DEFININDO ROTAS
        if ($user == 1) {

            return view('estatistica_atendente');

        }elseif($user == 2){

            $info = DB::table('pessoa')
            ->join('registro_atendimento','registro_atendimento.pessoa_id', '=', 'pessoa.id')
            ->join('andamento','andamento.registro_atendimento_id','registro_atendimento.id')
            ->join('status', 'status.id', 'andamento.status_id')
            ->select('pessoa.*', 'status.status')
            ->where([
                ['registro_atendimento.funcionario_id' , $user_id],
                ['registro_atendimento.aceito', 0]
                ])
            ->get();

            return view('estatistica', ['info' => $info]);
        }else{
            return view('conselheiro_adm', ['conselheiros' => $conselheiros]);
        }
    }
}
