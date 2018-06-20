<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\pessoa;

use App\Registro_atendimento;

class pessoa_cont_atendente extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $conselheiros = DB::table('funcionario')
            ->join('perfil', 'perfil.id', '=', 'funcionario.perfil_id')
            ->join('area_atuacao', 'area_atuacao.id', '=', 'funcionario.area_atuacao_id')
            ->select('funcionario.*', 'area_atuacao.atuacao', 'perfil.descricao')
            ->where('perfil.id', 2)
            ->get();

        $linhas = count($conselheiros);

        return view('input_atendente', ['conselheiros' => $conselheiros, 'linhas' => $linhas]);
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

        $id = Auth::user()->id;
        $pessoa = Pessoa::create($request->all());
        $info = DB::table('pessoa')
                ->select('id')
                ->latest()
                ->first();
        
        
        DB::table('registro_atendimento')
                    ->insert([
                        'created_at' => date("Y-m-d H:i:s"),
                        'funcionario_id' => $request['funcionario_id'],
                        'pessoa_id' => $info->id
                    ]);
        
        $last = DB::table('registro_atendimento')
                    ->select('id')
                    ->latest()
                    ->first();
                    
        DB::table('andamento')
                ->insert([
                    'descricao' => 'Não Sei oq é',
                    'data_hora' => date("Y-m-d H:i:s"),
                    'status_id' => 1,
                    'registro_atendimento_id' => $last->id
        ]);
        
        $info = DB::table('andamento')
                ->join('status', 'status.id', '=', 'andamento.status_id' )
                ->join('registro_atendimento','registro_atendimento.id' , '=','andamento.registro_atendimento_id' )
                ->join('pessoa', 'pessoa.id', '=', 'registro_atendimento.pessoa_id')
                ->select('pessoa.*','status.*')
                ->get();
        
        
        return view('listagem_atendente', ['info' => $info]);    
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
