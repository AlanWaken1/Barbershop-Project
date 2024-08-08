<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haircut extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'date', 'price', 'feature', 'price2', 'total'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'haircut_product');
    }

    public function calculateEarnings()
    {
        $employee = $this->employee;
        if ($employee->role == 'dueño') {
            return $this->price + $this->price2;
        } else {
            return ($this->price * 0.5) + ($this->price2 * 0.1);
        }
    }
}
