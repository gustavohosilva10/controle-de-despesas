<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user',
        'description',
        'category',
        'date',
        'value',
    ];
    public function User(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}