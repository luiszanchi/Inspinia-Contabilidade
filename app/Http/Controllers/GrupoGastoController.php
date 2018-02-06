<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use View;
use Illuminate\Http\Request;
use App\GrupoGasto;
use App\TipoGasto;

class GrupoGastoController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index(){
        $grupo_gasto_lista = GrupoGasto::get();
        $tipo_gasto_lista = TipoGasto::get();

        return View::make('grupo_produtos.index', 
            compact('grupo_gasto_lista'),
            compact('tipo_gasto_lista')
        );
    }
    public function novo(){
        $grupo_gasto_lista = GrupoGasto::get();
        $title = 'Tipo de Gasto | Cadastro';
        $operacao = 'Cadastrar Tipo de Gasto';
        $formURL = 'grupo_gasto/novo/gravar';
        
        return View::make('grupo_produtos.form',
            compact('grupo_gasto_lista','title','operacao','formURL')
        );
    }
    public function editar(Request $request){
        $grupo_gasto_lista = GrupoGasto::get();
        $tipoGasto = TipoGasto::where('cd_tipo_gasto','=',$request->input('cd_tipo_gasto'))->first();

        $title = 'Tipo de Gasto | Atualizar';
        $operacao = 'Atualizar Tipo de Gasto - '.$tipoGasto->ds_tipo_gasto;
        $formURL = 'grupo_gasto/editar/gravar';
        $editarTipoGasto = true;

        return View::make('grupo_produtos.form',
            compact('grupo_gasto_lista','title','operacao','formURL', 'tipoGasto', 'editarTipoGasto')
        );
    }
    public function excluir(Request $request){
        $tipoGasto = TipoGasto::where('cd_tipo_gasto','=',$request->input('cd_tipo_gasto'))->first();

        $title = 'Tipo de Gasto | Excluir';
        $operacao = 'Atualizar Tipo de Gasto - '.$tipoGasto->ds_tipo_gasto;
        $formURL = 'grupo_gasto/excluir/gravar';
        $excluirTipoGasto = true;

        return View::make('grupo_produtos.form',
            compact('title','operacao','formURL', 'tipoGasto', 'excluirTipoGasto')
        );
    }
    public function gravarNovo(Request $request){
        
        $descricao = $request->input('descricao');
        $cd_grupo_gasto = $request->input('codGrupoGasto');

        $tipoGasto = new TipoGasto();
        try{
            $tipoGasto->ds_tipo_gasto = $descricao;
            $tipoGasto->cd_grupo_gasto = $cd_grupo_gasto;
            $tipoGasto->save();
            return Redirect('/grupo_gasto/lista');
        }catch(Exception $e){
            print $e->getMessage;
        }
    }

    public function gravarEditar(Request $request){
        //dd($request);
        $cd_tipo_gasto = $request->input('codTipoGasto');
        $descricao = $request->input('descricao');
        $cd_grupo_gasto = $request->input('codGrupoGasto');

        $tipoGasto = TipoGasto::where('cd_tipo_gasto','=',$cd_tipo_gasto)->first();

        try{
            $tipoGasto->ds_tipo_gasto = $descricao;
            $tipoGasto->cd_grupo_gasto = $cd_grupo_gasto;
            $tipoGasto->save();
        //dd($tipoGasto);
            return Redirect('/grupo_gasto/lista');
        }catch(Exception $e){
            print $e->getMessage;
        }
    }
    public function gravarExcluir(Request $request){
        //dd($request);
        $cd_tipo_gasto = $request->input('codTipoGasto');
        $tipoGasto = TipoGasto::where('cd_tipo_gasto','=',$cd_tipo_gasto)->first();

        try{
            $tipoGasto->delete();
        //dd($tipoGasto);
            return Redirect('/grupo_gasto/lista');
        }catch(Exception $e){
            print $e->getMessage;
        }
    }
}