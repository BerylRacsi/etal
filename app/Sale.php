<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	public $primaryKey = 'id';


    protected $fillable = [
        'name', 'brand', 'category', 'price', 'intialprice', 'save', 'description', 'xs', 's', 'm', 'l', 'xl', 'color','gender', 'image', 'thumbnail', 'sizeguide', 'fitguide'
    ];
}
