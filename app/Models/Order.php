<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    public function product(){
        return $this->belongsToMany('App\Models\Product');
    }

    // mewakili nama tabel
    protected $table = 'orders';

    // kolom yang dapat diisi 
    protected $fillable = [
        'product_id', 'amount', 'buyer_name', 'buyer_contact'
    ];
}
