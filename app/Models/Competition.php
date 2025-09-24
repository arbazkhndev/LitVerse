<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    // ✅ Allow mass-assignment for these fields
    protected $fillable = [
        'title',
        'description',
        'type',
        'start_date',
        'end_date',
        'rules',
        'prize',
    ];

    // ✅ A competition can have many submissions
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
