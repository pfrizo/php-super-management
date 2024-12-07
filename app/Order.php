<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    public function products(){
        return $this->BelongsToMany('App\Product', 'order_products')->withPivot('id', 'created_at');
    }
}
