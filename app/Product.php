<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $primaryKey = 'id';


    protected $fillable = [
        'name', 'brand', 'category', 'price', 'description', 'xs', 's', 'm', 'l', 'xl', 'color','gender', 'image', 'thumbnail', 'sizeguide', 'fitguide'
    ];
}
