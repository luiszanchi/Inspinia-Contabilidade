<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LimitesDescricao extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'limites_descricao';
    public $timestamps = false;
    protected $primaryKey = 'tp_limite';
}