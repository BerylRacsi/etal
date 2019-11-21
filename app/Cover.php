<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    public $primaryKey = 'id';


    protected $fillable = [
        'id', 'cover',
    ];
}
