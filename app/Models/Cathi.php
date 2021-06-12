<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cathi extends Model
{
    use HasFactory;
    protected $table ='cathi';
    public function users() {
        return $this->belongsToMany('App\Models\Dotthi', 'dotthi_cathi', 'id_cathi', 'id_dotthi');
      }
}
