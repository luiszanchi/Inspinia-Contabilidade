<?php

namespace App\Http\Controllers;

use View;
use Carbon\Carbon;
use App\User;
use App\Limites;
use App\MeioPagRec;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GestaoLimitesController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index(){
        $gestaoLimitesLista = Limites::where('sn_ativo','=','S')->get();

        //$meioPagRecLista = MeioPagRec::get();
        
        // return View::make('index',compact('tipoGastoLista', 'totalDinheiro'));
        
        return View::make('gestao_limites.index',compact('gestaoLimitesLista'));
    }
}