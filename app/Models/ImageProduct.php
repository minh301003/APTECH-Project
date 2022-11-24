<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;
    protected $tableImg = 'image_products';
    protected $fillable = [
        'id',
        'product_ID',
        'image'
    ];
}
