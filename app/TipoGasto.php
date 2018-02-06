<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoGasto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_gasto';
    public $timestamps = false;
    protected $primaryKey = 'cd_tipo_gasto';

    public function grupoGasto()
    {
        return $this->hasOne('App\GrupoGasto','cd_grupo_gasto','cd_grupo_gasto');
    }
}