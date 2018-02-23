<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Limites extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'limites';
    public $timestamps = false;
    protected $primaryKey = 'cd_limite';
    
    public function tipoGasto()
    {
        return $this->hasOne('App\TipoGasto','cd_tipo_gasto','cd_tipo_gasto');
    }
    public function descTipoLimite(){
        return $this->hasOne('App\LimitesDescricao','tp_limite','tp_limite');
            //D = diário; S = Semanal; Q = Quinzenal; M = Mensal; A = Anual
    } 
    public function descSnUteis(){
        return $this->hasOne('App\SimNao','cd_sn','sn_uteis');
    }
    public function descSnAtivo(){
        return $this->hasOne('App\SimNao','cd_sn','sn_ativo');
    }
}