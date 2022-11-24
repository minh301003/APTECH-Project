<?php

namespace App\Models;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'id',
        'created_at',
        'user_ID',
        'user_name',
        'user_address',
        'user_phone',
        'user_email',
        'amount',
        'total',
        'payment_method',
        'ship_status',
        'payment_status',
        'accept_status',
    ];

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }
}
