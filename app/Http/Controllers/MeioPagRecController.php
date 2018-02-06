<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use View;
use Illuminate\Http\Request;
use App\MeioPagRec;

class MeioPagRecController extends Controller
{
    var $title = 'Meio de Pagamento Recebimento | ';
    var $operacao = ' Meio de Pagamento Recebimento';
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index(){
        $meio_pag_rec_lista = MeioPagRec::get();

        return View::make('meio_pag_rec.index', 
            compact('meio_pag_rec_lista')
        );
    }
    public function novo(){
        $title = $this->title.'Cadastro';
        $operacao = 'Cadastrar'.$this->operacao;
        $formURL = 'meio_pag_rec/novo/gravar';
        
        return View::make('meio_pag_rec.form',
            compact('title','operacao','formURL')
        );
    }
    public function gravarNovo(Request $request){
        
        $descricao = $request->input('descricao');
        
        $meioPagRec = new MeioPagRec();
        try{
            $meioPagRec->ds_meio_pag_rec = $descricao;
            $meioPagRec->save();
            return Redirect('/meio_pag_rec/lista');
        }catch(Exception $e){
            print $e->getMessage;
        }
    }
    public function editar(Request $request){
        $meioPagRec = MeioPagRec::where('cd_meio_pag_rec','=',$request->input('cd_meio_pag_rec'))->first();

        $title = $this->title.'Atualizar';
        $operacao = 'Atualizar'.$this->operacao.' - '.$meioPagRec->ds_meio_pag_rec;
        $formURL = 'meio_pag_rec/editar/gravar';
        $editarMeioPagRec = true;

        return View::make('meio_pag_rec.form',
            compact('meioPagRec', 'title','operacao','formURL', 'editarMeioPagRec')
        );
    }
    public function gravarEditar(Request $request){
        //dd($request);
        $cd_meio_pag_rec = $request->input('codMeioPagRec');
        $descricao = $request->input('descricao');

        $meioPagRec = MeioPagRec::where('cd_meio_pag_rec','=',$cd_meio_pag_rec)->first();

        try{
            $meioPagRec->ds_meio_pag_rec = $descricao;
            $meioPagRec->save();
        //dd($tipoGasto);
            return Redirect('/meio_pag_rec/lista');
        }catch(Exception $e){
            print $e->getMessage;
        }
    }
    public function excluir(Request $request){
        $meioPagRec = MeioPagRec::where('cd_meio_pag_rec','=',$request->input('cd_meio_pag_rec'))->first();

        $title = $this->title.'Excluir';
        $operacao = 'Excluir '.$this->operacao.' - '.$meioPagRec->ds_meio_pag_rec;
        $formURL = 'meio_pag_rec/excluir/gravar';
        $excluirMeioPagRec = true;

        return View::make('meio_pag_rec.form',
            compact('title','operacao','formURL', 'meioPagRec', 'excluirMeioPagRec')
        );
    }
    public function gravarExcluir(Request $request){
        //dd($request);
        $cd_meio_pag_rec = $request->input('codMeioPagRec');
        $meioPagRec = MeioPagRec::where('cd_meio_pag_rec','=',$cd_meio_pag_rec)->first();

        try{
            $meioPagRec->delete();
        //dd($tipoGasto);
            return Redirect('/meio_pag_rec/lista');
        }catch(Exception $e){
            print $e->getMessage;
        }
    }
    
}