<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    public $timestamps = false;
    // use SoftDeletes;
    
    public function products() {
        return $this->hasMany('App\Product', 'supplier_id');
    }
}
