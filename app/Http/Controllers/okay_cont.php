<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\pessoa;
use App\Registro_atendimento;
use Illuminate\Support\Facades\Auth;

class okay_cont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($data)
    {
        $info = DB::table('andamento')
                ->join('registro_atendimento','registro_atendimento.id' , '=','andamento.registro_atendimento_id' )
                ->join('status', 'status.id', '=', 'andamento.status_id')
                ->join('pessoa','registro_atendimento.pessoa_id', '=','pessoa.id')
                ->join('funcionario','funcionario.id','registro_atendimento.funcionario_id')
                ->select('funcionario.nome','status.status','andamento.*')
                ->where('andamento.registro_atendimento_id', $data)
                ->orderby('andamento.data_hora', 'DESC')
                ->get();

    $pessoa = DB::table('pessoa')
        ->join('registro_atendimento', 'pessoa.id', 'registro_atendimento.pessoa_id')
        ->where('registro_atendimento.id', $data)
        ->first();

    if (($pessoa->status_id) == 9) {
        return view('processo_finalizado', ['info' => $info, 'pessoa' => $pessoa]);
    }elseif(($pessoa->status_id) == 4) {
        return view('processo_deliberacao', ['pessoa' => $pessoa, 'info' => $info]);
    }else{
        return view('processo_edit', ['pessoa' => $pessoa, 'info' => $info]);
    }
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
