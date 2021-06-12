<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dotthi extends Model
{
    use HasFactory;
    protected $table ='dotthi';
    public function cathi()
    {
    	return $this->hasMany('App\Models\Cathi', 'id_dotthi','id');
    }

    public function baithi()
    {
    	return $this->hasMany('App\Models\Baithi', 'id_dotthi','id');
    }
    
    public function diemthi()
    {
    	return $this->hasMany('App\Models\Diemthi', 'id_dotthi','id');
    }
}
