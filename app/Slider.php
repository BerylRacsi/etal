<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $primaryKey = 'id';


    protected $fillable = [
        'id', 'slide', 'top', 'bottom',
    ];
}
