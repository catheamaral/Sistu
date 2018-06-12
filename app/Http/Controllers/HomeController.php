<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $user = Auth::user()->perfil_id;
        if ($user == 1) {
            # code...
            return view('estatistica');
        }elseif($user == 2){
            return view('estatistica_atendente');
        }else{
            #return view('');
        }
    }
}
