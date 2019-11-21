<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $primaryKey = 'id';


    protected $fillable = [
        'order_number', 'name', 'provinsi', 'kabupaten', 'kecamatan', 'address', 'zip', 'phone', 'email', 'note', 'order', 'bukti', 'harga', 'resi', 'product_detail', 'validasi',
    ];
}
