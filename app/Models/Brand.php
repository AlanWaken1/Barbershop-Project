<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name']; // Campos que pueden ser llenados de forma masiva

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}