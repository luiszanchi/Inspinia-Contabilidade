<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimNao extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'simnao';
    public $timestamps = false;
    protected $primaryKey = 'cd_sn';
    
}