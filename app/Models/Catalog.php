<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Catalog extends Model
{
    use HasFactory;
    protected $table = 'catalog';
    protected $fillable = [
        'id',
        'catalog_name',
        'created_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'catalog_ID', 'id');
    }
}