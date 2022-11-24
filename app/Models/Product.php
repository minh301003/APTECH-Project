<?php

namespace App\Models;
use App\Models\ImageProduct;
use App\Models\Catalog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'price',
        'description',
        'amount'
    ];

    public function productImages() {
        return $this->hasMany(ImageProduct::class, 'product_ID', 'id');
    }

    public function catalog() {
        return $this->belongsTo(Catalog::class, 'catalog_ID', 'id');
    }
}
