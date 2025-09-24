<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    // ✅ Allow mass-assignment for these fields
    protected $fillable = [
        'competition_id',
        'user_id',
        'file_path',
        'is_winner',
    ];

    // ✅ A submission belongs to one competition
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    // ✅ A submission belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
