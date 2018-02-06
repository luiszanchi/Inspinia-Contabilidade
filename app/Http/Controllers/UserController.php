<?php

namespace App\Http\Controllers;

use View;
use App\User;
use App\TipoGasto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index(){
        $tipoGastoLista = TipoGasto::orderBy('cd_tipo_gasto','ASC')->get();

        return View::make('index', 
            compact('tipoGastoLista')
        );
    }
    public function query(){
        $retorno = \DB::table('grupo_gasto')->first();
        print $retorno->cd_grupo_gasto.' - '.$retorno->ds_grupo_gasto;
    }
}