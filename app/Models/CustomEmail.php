<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'recipient',
        'subject',
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id')->select(['id', 'user_name']);
    }
}
