<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // ✅ Allow mass-assignment for these fields
    protected $fillable = [
        'user_id',
        'book_id',
        'type',
        'status',
        'payment_status',
        'shipping_address',
    ];

    // ✅ An order belongs to a book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // ✅ An order belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
