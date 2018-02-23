<?php

namespace App\Http\Controllers;

use View;
use Carbon\Carbon;
use App\User;
use App\Helper;
use App\TipoGasto;
use App\Gastos;
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
        $totalDinheiro = Gastos::selectRaw('sum(case when tp_operacao = \'-\' then vl_gasto else 0 end) as total_gasto')
                            ->selectRaw('sum(case when tp_operacao = \'+\' then vl_gasto else 0 end) as total_ganho')
                            ->first();
        $totalDinheiro->total = number_format((float)($totalDinheiro->total_ganho - $totalDinheiro->total_gasto), 2, ',', '');
        


        $tipoGastoLista = TipoGasto::orderBy('cd_tipo_gasto','ASC')->get();

        return View::make('index', 
            compact('tipoGastoLista', 'totalDinheiro')
        );
    }
    public function query(){
        $data1 = Carbon::now('America/Sao_Paulo');
        $data2 = Carbon::now('America/Sao_Paulo');
        $data2->addMonth();
        $data2->addDay();
        //dd($data1->diff($data2, true));
        dd(Helper::isMonthDiff($data1,$data2));
    }
}