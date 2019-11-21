<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
     public $primaryKey = 'id';


    protected $fillable = [
        'id', 'name', 'user_id', 'profile', 'instagram', 'twitter', 'linkedin', 'description', 'image',
    ];
}
