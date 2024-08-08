<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id', 'name', 'type', 'price'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function haircuts()
    {
        return $this->belongsToMany(Haircut::class, 'haircut_product');
    }
}
