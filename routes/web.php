<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/conselheiro', function () {
    return view('conselheiro');
});

Route::get('/novos', function () {
    return view('novos');
});

########################################### INFORMAÇÃO DOS CONSELHEIROS
Route::get('/info_conselheiro/{id}', function ($id) {

    $conselheiros = DB::table('funcionario')
            ->join('perfil', 'perfil.id', '=', 'funcionario.perfil_id')
            ->join('area_atuacao', 'area_atuacao.id', '=', 'funcionario.area_atuacao_id')
            ->select('funcionario.nome', 'area_atuacao.atuacao', 'perfil.descricao','funcionario.data_nascimento')
            ->where('funcionario.id', $id)
            ->get();

    return view('info_conselheiro', ['conselheiros' => $conselheiros]);
});
###########################################

###########################################33 HOME CONSELHEIRO
Route::get('/estatistica', function () {
    return view('estatistica');
});
################################################################ HOME ATENDENTE
Route::get('/estatistica_atendente', function () {
    return view('estatistica_atendente');
});
############################################################# HOME ADM
Route::get('/conselheiros', function () {

    $conselheiros = DB::table('funcionario')
            ->join('perfil', 'perfil.id', '=', 'funcionario.perfil_id')
            ->join('area_atuacao', 'area_atuacao.id', '=', 'funcionario.area_atuacao_id')
            ->select('funcionario.nome', 'area_atuacao.atuacao', 'perfil.descricao', 'funcionario.id')
            ->get();


    return view('conselheiro_adm', ['conselheiros' => $conselheiros]);
});
#############################################################

Route::get('/processo_deliberacao', function () {
    return view('precesso_deliberacao');
});

Route::get('/relatorio', function () {
    return view('relatorio');
});

Route::get('/gerarRelatorio', function () {
    return view('gerarRelatorio');
});

Route::get('/third', function () {
    return view('third');
});

Route::get('/third', function () {
    return view('third');
});


######################################################33
#ROTAS DE ACESSO AS LISTAGEM NO PROCESSO
###########################################################
Route::get('np/{data}',  function ($data) {

    $info = DB::table('pessoa')->where('id', $data)->get();

    #echo $data;
    return view('numerProcesso', ['info' => $info]);
});


Route::get('np/okay/{data}',  function ($data) {

    $pessoa = DB::table('pessoa')->where('id', $data)->get();

    #$dt = strtotime($data->data_nascimento);

    return view('processo_edit', ['pessoa' => $pessoa]);

});

Route::get('np/okay/input_edit/{data}',  function ($data) {

    $pessoa = DB::table('pessoa')->where('id', $data)->get();

    #$dt = strtotime($data->data_nascimento);

    return view('input_edit', ['pessoa' => $pessoa]);

});

################################################################ INPUT CONSELHEIRO
Route::get('input/', 'pessoa_cont@index' );
################################################################ INPUT ATENDENTE
Route::get('/input_atendente', 'pessoa_cont_atendente@index');
################################################################# INPUT ADM
Route::get('/input_adm', 'pessoa_cont_adm@index' );

//Route::get('listagem', 'listagem_cont@index' );
Route::post('verify', 'pessoa_cont@store');

Route::post('verify_atendente', 'pessoa_cont_atendente@store');
Route::post('verify_adm', 'pessoa_cont_adm@store');
################################################################################################################
#ROTAS DE LISTAGEM
################################################################################################################
Route::get('listagem', function () {

    $info = DB::table('pessoa')->get();

    return view('listagem', ['info' => $info]);
});

Route::get('listagem_atendente', function () {

    $info = DB::table('andamento')
                ->join('status', 'status.id', '=', 'andamento.status_id' )
                ->join('registro_atendimento','registro_atendimento.id' , '=','andamento.registro_atendimento_id' )
                ->join('pessoa', 'pessoa.id', '=', 'registro_atendimento.pessoa_id')
                ->select('pessoa.*','status.descricao')
                ->get();

    return view('listagem_atendente', ['info' => $info]);
});

Route::get('meusProcessos', function () {

    $info = DB::table('pessoa')->get();

    return view('meusProcessos', ['info' => $info]);
});


########################################################################ROTAS DE LOGIN
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

##################################################################################

Route::post('np/okay/input_edit/edit/{id}', 'pessoa_cont@update');

##################################################################################
