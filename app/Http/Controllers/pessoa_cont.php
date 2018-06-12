<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Pessoa;

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

        $pessoa = Pessoa::find($id);
        $pessoa->nome = $request['nome'];
        $pessoa->data_nascimento = $request['data_nascimento'];

        $pessoa->genitor = $request['genitor'];
        $pessoa->contato_genitor = $request['contato_genitor'];
        $pessoa->cpf_genitor = $request['cpf_genitor'];
        $pessoa->rg_genitor= $request['rg_genitor'];

        $pessoa->genitora = $request['genitora'];
        $pessoa->contato_genitora = $request['contato_genitora'];
        $pessoa->cpf_genitora = $request['cpf_genitora'];
        $pessoa->rg_genitora = $request['rg_genitora'];

        $pessoa->denunciante = $request['denunciante'];
        $pessoa->contato_denunciante = $request['contato_denunciante'];
        $pessoa->cpf_denunciante = $request['cpf_denunciante'];
        $pessoa->rg_denunciante= $request['rg_denunciatne'];

        $pessoa->responsavel = $request['responsavel'];
        $pessoa->contato_responsavel = $request['contato_responsavel'];
        $pessoa->cpf_responsavel = $request['cpf_responsavel'];
        $pessoa->rg_responsavel = $request['rg_responsavel'];

        $pessoa->LocalOcorrencia = $request['LocalOcorrencia'];
        $pessoa->endereco = $request['endereco'];
        $pessoa->complemento = $request['complemento'];
        $pessoa->save();

        return view('processo_edit2', ['pessoa' => $pessoa]);


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
