<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebsiteContact extends Model
{
    use SoftDeletes;

    protected $table = 'website_contacts';
    protected $fillable = ['name', 'phone', 'email', 'contact_type_id', 'message'];
}
