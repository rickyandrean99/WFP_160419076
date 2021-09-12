<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    // public $timestamps = true;
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';

    public function supplier() {
        return $this->belongsTo('App\Supplier', 'supplier_id');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
