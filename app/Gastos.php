<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gastos';
    public $timestamps = false;
    protected $primaryKey = 'cd_gastos';
    
    public function tipoGasto()
    {
        return $this->hasOne('App\TipoGasto','cd_tipo_gasto','cd_tipo_gasto');
    }
}