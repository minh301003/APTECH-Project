<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $table= 'rate';
    protected $fillable = [
        'id',
        'user_ID',
        'product_ID',
        'comment',
        'star'
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_ID', 'id');
    }

}
