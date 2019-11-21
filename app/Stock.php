<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $primaryKey = 'id';


    protected $fillable = [
        'id', 'id_product', 'size', 'amount',
    ];
}
