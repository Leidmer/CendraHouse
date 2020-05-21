<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = 'properties';
    protected $hidden = ['created_at', 'updated_at'];

    public function cat(){
        return $this->hasOne(Type::class,'id','type_id');
    }
}
