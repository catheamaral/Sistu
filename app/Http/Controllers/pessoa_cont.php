<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Pessoa;

use App\Direito_violado;

use App\Agente_violador;

class pessoa_cont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        #$pessoa = DB::table('perfil')

        
        return view("input");
        
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
        $pessoa = Pessoa::create($request->all());
        
        return view('processos', ['pessoa' => $pessoa, 'cadastrado' => $request['cadastrado']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        //dd($id);
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

        #################################### Direito Violado

        $direito = Direito_violado::create($request->all());

        $last_dv = DB::table('direito_violado')
                    ->select('id')
                    ->latest()
                    ->first();
        
        $lol = DB::table('registro_atendimento')->where('pessoa_id', $id)->first();

        DB::table('registroatend_direitoviolado')
            ->insert([
            'created_at' => date("Y-m-d H:i:s"),
            'registro_atendimento_id' => $lol->id,
            'direito_violado_id' => $last_dv->id
        ]);
        
        #################################### Agente Violador

        $violador = Agente_violador::create($request->all());

        $last_av = DB::table('direito_violado')
                    ->select('id')
                    ->latest()
                    ->first();
        
        DB::table('registroatend_agenteviolador')
            ->insert([
            'created_at' => date("Y-m-d H:i:s"),
            'registro_atendimento_id' => $lol->id,
            'agente_violador_id' => $last_av->id
        ]);


        #################################### ATUALIZANDO STATUS
        DB::table('andamento')
                ->insert([
                    'descricao' => 'Não Sei oq é',
                    'data_hora' => date("Y-m-d H:i:s"),
                    'status_id' => 10,
                    'registro_atendimento_id' => $lol->id
        ]);
        
        #################################### PASSANDO DADOS PRA VIEW
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
        
    }
}
