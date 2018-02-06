<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeioPagRec extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meio_pag_rec';
    public $timestamps = false;
    protected $primaryKey = 'cd_meio_pag_rec';
}