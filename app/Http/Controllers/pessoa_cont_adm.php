<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\pessoa;
use App\funcionario;
use App\user;

class pessoa_cont_adm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('input_adm');
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
        //################################################### VALIDAÇÃO
        $validatedData = $request->validate([
            /* LOGIN */
            'nome' => 'required|max:255',
            'email' => 'required|email|string|unique:users,email',
            'password' => 'required|min:6',
            /* IDENTIFICAÇÃO */
            'perfil_id' => 'required',
            /* AREA DE ATUAÇÃO */
            'area_atuacao_id' => 'required'
        ],
        [
            'email.required' => 'O Campo é necessário para o cadastro',
            'password.required' => 'A Senha é Obrigatória',
            'perfil_id.required' => 'Selecione a Função do Atendente',
            'area_atuacao_id.required' => 'Selecione a Área de Atuação do Atendente', 
            'email.email' => 'Insira um Email válido',
            'email.unique' => 'O Email já está em uso',
        ]);
        //################################################### FIM DA VALIDAÇÃO
        
        $info = Funcionario::create($request->all());
        //$usuario = User::create($request->all());
        $usuario = User::create([
            'nome' => $request['nome'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'perfil_id' => $request['perfil_id'],
        ]);

        $ra = DB::table('funcionario')
            ->select('id')
            ->latest()
            ->first();
        
        $last = DB::table('users')
            ->select('id')
            ->latest()
            ->first();

        DB::table('verifications')
                ->insert([
                    'users_id' => $last->id,
                    'funcionario_t_id' => $ra->id
        ]);


        $conselheiros = DB::table('funcionario')
            ->join('perfil', 'perfil.id', '=', 'funcionario.perfil_id')
            ->join('area_atuacao', 'area_atuacao.id', '=', 'funcionario.area_atuacao_id')
            ->select('funcionario.*', 'area_atuacao.atuacao', 'perfil.descricao')
            ->get();

        return view('conselheiro_adm', ['conselheiros' => $conselheiros]);
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
