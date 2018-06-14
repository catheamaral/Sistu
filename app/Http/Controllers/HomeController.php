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
        #####################
        
        $conselheiros = DB::table('funcionario')
            ->join('perfil', 'perfil.id', '=', 'funcionario.perfil_id')
            ->join('area_atuacao', 'area_atuacao.id', '=', 'funcionario.area_atuacao_id')
            ->select('funcionario.*', 'area_atuacao.atuacao', 'perfil.descricao')
            ->get();



        if ($user == 1) {
            # code...
            return view('estatistica_atendente');
        }elseif($user == 2){
            return view('estatistica');
        }else{
            return view('conselheiro_adm', ['conselheiros' => $conselheiros]);
        }
    }
}
