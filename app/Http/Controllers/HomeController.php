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

        $index = DB::table('registro_atendimento')
            ->count('id');

        $proc = DB::table('registro_atendimento')
            ->where('status_id','<>',9)
            ->count('id');

        $vida = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.vida', 1)
            ->count('direito_violado.vida');

        $saude = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.saude', 1)
            ->count('direito_violado.saude');

        ############################################# DEFININDO ROTAS
        if ($user == 1) {

            return view('estatistica_atendente',['index' => $index, 
                                                'proc' => $proc,
                                                'vida' => $vida,
                                                'saude' => $saude,]);

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
            ->groupBy('andamento.registro_atendimento_id')
            ->get();

            return view('estatistica', ['info' => $info, 
                                        'index' => $index, 
                                        'proc' => $proc,
                                        'vida' => $vida,
                                        'saude' => $saude,
                                        ]);
        }else{
            return view('conselheiro_adm', ['conselheiros' => $conselheiros]);
        }
    }
}
