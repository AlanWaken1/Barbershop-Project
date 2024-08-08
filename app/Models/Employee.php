<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'role'];

    public function isOwner()
    {
        return strtolower($this->role) === 'dueño';
    }

}
