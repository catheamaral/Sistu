<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\pessoa;
use App\Registro_atendimento;
use Illuminate\Support\Facades\Auth;

class triagem_cont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $info = DB::table('pessoa')
            ->join('registro_atendimento','registro_atendimento.pessoa_id', '=', 'pessoa.id')
            ->select('pessoa.*')
            ->where([
                ['registro_atendimento.aceito', '=', 2],
                ])
            ->get();

        return view('triagem', ['info' => $info]);
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
        $info = DB::table('pessoa')->where('id', $id)->first();

        $conselheiros = DB::table('funcionario')
            ->join('perfil', 'perfil.id', '=', 'funcionario.perfil_id')
            ->join('area_atuacao', 'area_atuacao.id', '=', 'funcionario.area_atuacao_id')
            ->select('funcionario.*', 'area_atuacao.atuacao', 'perfil.descricao')
            ->where('perfil.id', 2)
            ->get();

        return view('input_at_edit',['info' => $info, 'conselheiros' => $conselheiros]);

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
        $info = Pessoa::find($id);
        $info->nome = $request['nome'];
        $info->data_nascimento = $request['data_nascimento'];

        $info->genitor = $request['genitor'];
        $info->contato_genitor = $request['contato_genitor'];
        $info->cpf_genitor = $request['cpf_genitor'];
        $info->rg_genitor= $request['rg_genitor'];

        $info->genitora = $request['genitora'];
        $info->contato_genitora = $request['contato_genitora'];
        $info->cpf_genitora = $request['cpf_genitora'];
        $info->rg_genitora = $request['rg_genitora'];

        $info->denunciante = $request['denunciante'];
        $info->contato_denunciante = $request['contato_denunciante'];
        $info->cpf_denunciante = $request['cpf_denunciante'];
        $info->rg_denunciante= $request['rg_denunciatne'];

        $info->responsavel = $request['responsavel'];
        $info->contato_responsavel = $request['contato_responsavel'];
        $info->cpf_responsavel = $request['cpf_responsavel'];
        $info->rg_responsavel = $request['rg_responsavel'];

        $info->LocalOcorrencia = $request['LocalOcorrencia'];
        $info->endereco = $request['endereco'];
        $info->complemento = $request['complemento'];
        $info->save();

        $info = Registro_atendimento::find($id);
        $info->aceito = 0;
        $info->status_id = 1;
        $info->funcionario_id = $request['funcionario_id'];
        $info->save();

        DB::table('andamento')
                ->insert([
                    'descricao' => 'Sem Providência',
                    'data_hora' => date("Y-m-d H:i:s"),
                    'status_id' => 1,
                    'registro_atendimento_id' => $id
        ]);

        $info = DB::table('andamento')
                ->join('registro_atendimento','registro_atendimento.id' , '=','andamento.registro_atendimento_id' )
                ->join('status', 'status.id', '=', 'andamento.status_id')
                ->join('pessoa','registro_atendimento.pessoa_id', '=','pessoa.id')
                ->select('pessoa.*','status.status')
                ->groupBy('andamento.registro_atendimento_id', 'pessoa.id')
                ->orderby('andamento.data_hora', 'DESC')
                ->get();

    return view('listagem_atendente', ['info' => $info]);


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
