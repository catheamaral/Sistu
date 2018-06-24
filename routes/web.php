
<?php

use Illuminate\Support\Facades\Auth;
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

    $info = DB::table('funcionario')
        ->join('area_atuacao','funcionario.area_atuacao_id','area_atuacao.id')
        ->select('funcionario.*', 'area_atuacao.atuacao')
        ->where('perfil_id', 2)->get();

    return view('conselheiro', ['info' => $info]);
});

Route::get('novos/', 'Novos@index' );

Route::get('/aceito/{id}', 'aceito@index' );

Route::get('/aceito/{id}/wright', 'aceito@update' );

Route::post('/aceito/{id}/recusa', 'recusa_cont@update' );

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
Route::get('/estatistica', 'HomeController@index');
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

Route::get('/third/{id}', function ($id) {

    $info = DB::table('andamento')
                ->join('registro_atendimento','registro_atendimento.id' , '=','andamento.registro_atendimento_id' )
                ->join('status', 'status.id', '=', 'andamento.status_id')
                ->join('pessoa','registro_atendimento.pessoa_id', '=','pessoa.id')
                ->join('funcionario','funcionario.id','registro_atendimento.funcionario_id')
                ->select('status.status', 'pessoa.*')
                ->where('registro_atendimento.funcionario_id', $id)
                ->orderby('andamento.data_hora', 'DESC')
                ->groupBy('andamento.registro_atendimento_id')
                ->get();
    
    $pessoa = DB::table('funcionario')->where('id', $id)->first();

    return view('third', ['info' => $info, 'pessoa' => $pessoa]);
});

Route::get('/third/{data}/detalhes/{{id}}', 'listagem_cont@show');


######################################################33
#ROTAS DE ACESSO AO PROCESSO
###########################################################
Route::get('np/{data}',  function ($data) {

    $info = DB::table('pessoa')->where('id', $data)->get();

    return view('numerProcesso', ['info' => $info]);
});


Route::get('np/okay/{data}',  function ($data) {

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

    $info = DB::table('registro_atendimento')
            ->join('pessoa', 'pessoa.id', 'registro_atendimento.pessoa_id')
            ->join('status', 'status.id', 'registro_atendimento.status_id')
            ->select('pessoa.*','status.status')
            ->get();

    return view('listagem_atendente', ['info' => $info]);
});

Route::get('listagem_atendente', function () {

    $info = DB::table('registro_atendimento')
            ->join('pessoa', 'pessoa.id', 'registro_atendimento.pessoa_id')
            ->join('status', 'status.id', 'registro_atendimento.status_id')
            ->select('pessoa.*','status.status')
            ->get();

    return view('listagem_atendente', ['info' => $info]);
});

Route::get('meusProcessos', 'meus_processos_cont@index');

Route::get('triagem', 'triagem_cont@index');

Route::get('nova_triagem/{id}', 'triagem_cont@show');

Route::post('nova_triagem/{id}/triagem_nova', 'triagem_cont@update');

########################################################################ROTAS DE LOGIN
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

#################################################################################

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

##################################################################################

Route::post('np/okay/input_edit/edit/{id}', 'pessoa_cont@update');

##################################################################################
Route::post('np/okay/{id}/finalizar', 'finalizar_cont@update');