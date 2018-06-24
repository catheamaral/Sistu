<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use App\pessoa;
use App\Registro_atendimento;

class aceito extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $info = DB::table('pessoa')->where('id', $id)->first();


        return view('aceito',['info' => $info]);

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
        $info = Registro_atendimento::find($id);
        $info->aceito = 1;
        $info->save();

        DB::table('andamento')
                ->insert([
                    'descricao' => 'Sem Providência',
                    'data_hora' => date("Y-m-d H:i:s"),
                    'status_id' => 2,
                    'registro_atendimento_id' => $id
        ]);

        $pessoa = DB::table('pessoa')
                        ->where('id',$id)
                        ->first();

        $info = DB::table('andamento')
            ->join('registro_atendimento','registro_atendimento.id' , '=','andamento.registro_atendimento_id' )
            ->join('status', 'status.id', '=', 'andamento.status_id')
            ->join('pessoa','registro_atendimento.pessoa_id', '=','pessoa.id')
            ->join('funcionario','funcionario.id','registro_atendimento.funcionario_id')
            ->select('funcionario.nome','status.status','andamento.*')
            ->where('andamento.registro_atendimento_id', $id)
            ->orderby('andamento.data_hora', 'DESC')
            ->get();

        return view('processo_edit', ['pessoa' => $pessoa, 'info' => $info]);

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
