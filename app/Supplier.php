<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function products() {
        return $this->hasMany('App\Product', 'supplier_id');
    }
}
