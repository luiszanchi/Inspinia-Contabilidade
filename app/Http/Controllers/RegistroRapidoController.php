<?php

namespace App\Http\Controllers;

use View;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Gastos;

class RegistroRapidoController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function gasto(Request $request){
        $gasto = new Gastos();
        


        try{
            $gasto->cd_tipo_gasto = $request->get('tipoGasto');
            $gasto->tp_operacao = $request->get('opcaoNatureza');
            $gasto->ds_gasto = $request->get('descricaoGasto');
            $gasto->vl_gasto = $request->get('valorGasto');
            $gasto->save();
            
        }catch(Exception $e){
            print $e->getMessage;
            return false;
        }

        /*return $request->get('id').' - '.$request->get('tipoGasto').' - '.$request->get('valorGasto').' - '.$request->get('opcaoNatureza').' - '.$request->get('descricaoGasto');*/        
    }
}