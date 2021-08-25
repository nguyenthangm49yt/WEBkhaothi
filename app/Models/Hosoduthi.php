<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hosoduthi extends Model
{
    use HasFactory;
    protected $table ='hosoduthi';
    
    public function user(){
        return $this->hasOne('App\Models\User' , 'id','id_user');
    }
}
