<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pessoa;
use App\Registro_atendimento;
use Illuminate\Support\Facades\Auth;

class relatorio_cont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        ##################### QUANTOS ATENDIMENTO
        $index = DB::table('registro_atendimento')
            ->count('id');

        $saude = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.saude', 1)
            ->count('direito_violado.saude');
        
        $vida = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.vida', 1)
            ->count('direito_violado.vida');
        
        $freedom = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.freedom', 1)
            ->count('direito_violado.freedom');
        
        $respect = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.respect', 1)
            ->count('direito_violado.respect');
        
        $dig = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.dig', 1)
            ->count('direito_violado.dig');
        
        $ConvF = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.ConvF', 1)
            ->count('direito_violado.ConvF');
        
        $ConvComunitaria = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.ConvComunitaria', 1)
            ->count('direito_violado.ConvComunitaria');

        $educacao = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.educacao', 1)
            ->count('direito_violado.educacao');

        $cultura = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.cultura', 1)
            ->count('direito_violado.cultura');
        
        $esporte = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.esporte', 1)
            ->count('direito_violado.esporte');
        
        $lazer = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.lazer', 1)
            ->count('direito_violado.lazer');
        
        $profissa = DB::table('registroatend_direitoviolado')
            ->join('direito_violado', 'direito_violado.id', 'registroatend_direitoviolado.direito_violado_id')
            ->select('direito_violado.*')
            ->where('direito_violado.profissa', 1)
            ->count('direito_violado.profissa');

        return view('relatorio', ['index' => $index,
                                    'saude' => $saude,
                                    'vida' => $vida,
                                    'freedom' => $freedom,
                                    'respect' => $respect,
                                    'dig' => $dig,
                                    'ConvF' => $ConvF,
                                    'ConvComunitaria' => $ConvComunitaria,
                                    'cultura' => $cultura,
                                    'esporte' => $esporte,
                                    'lazer' => $lazer,
                                    'profissa' => $profissa,
                                    'educacao' => $educacao
                                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
