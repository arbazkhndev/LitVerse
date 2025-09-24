<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // ✅ Allow mass-assignment for these fields
    protected $fillable = [
        'title',
        'author',
        'category',
        'description',
        'price',
        'type',
        'subscription_period',
        'shipping_charges',
        'pdf_file',
    ];

    // ✅ One book can have many orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
