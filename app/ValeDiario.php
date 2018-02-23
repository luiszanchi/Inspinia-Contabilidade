<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValeDiario extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vale_diario';
    public $timestamps = false;
    protected $primaryKey = 'cd_vale_diario';
    
    public function tipoGasto()
    {
        return $this->hasOne('App\TipoGasto','cd_tipo_gasto','cd_tipo_gasto');
    }

    /*
select cd_tipo_gasto
     , sum(case when sn_ida_volta = 'S' then 2*vl_vale_diario else vl_vale_diario end ) vl_diario
  from vale_diario
 group by cd_tipo_gasto
    */
}