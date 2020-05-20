<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    //Faig servir soft delete, d'aquesta forma no surt a la web però si queda a la base de dades per no trencar relacions entre tipus i propietats
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = 'types';
    protected $hidden = ['created_at', 'updated_at'];
}
