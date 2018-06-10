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

Route::get('/estatistica', function () {
    return view('estatistica');
});

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

Route::get('/meusProcessos', function () {
    return view('meusProcessos');
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

################################################################3


Route::get('input', 'pessoa_cont@index' );
//Route::get('listagem', 'listagem_cont@index' );
Route::post('verify', 'pessoa_cont@store');


Route::get('listagem', function () {

    $info = DB::table('pessoa')->get();

    return view('listagem', ['info' => $info]);
});


########################################################################ROTAS DE LOGIN
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

##################################################################################
##################################################################################

Route::post('np/okay/input_edit/edit/{id}', 'pessoa_cont@update');

##################################################################################