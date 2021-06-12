<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diemthi extends Model
{
    use HasFactory;
    protected $table ='diemthi';
    public function phong()
    {
        return $this->hasMany('App\Models\Phong','id_diemthi', 'id');
    }
}
