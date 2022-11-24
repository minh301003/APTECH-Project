<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $fillable = [
        'id',
        'order_ID',
        'user_ID',
        'product_ID',
        'amount',
        'total'
    ];


    public function products() {
        return $this->belongsTo(Product::class, 'product_ID', 'id');
    }
}
