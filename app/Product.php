<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'weight', 'unit_id', 'supplier_id'];

    public function productDetail(){
        return $this->hasOne('App\ProductDetail');
        //return $this->hasOne('App\ProductDetail', 'product_id', 'id');
    }

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }

    public function orders(){
        return $this->belongsToMany('App\Order', 'order_products');
    }
}
