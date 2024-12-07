<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    //
    use SoftDeletes;
    protected $table = 'suppliers';
    protected $fillable = ['name', 'website', 'uf', 'email'];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
