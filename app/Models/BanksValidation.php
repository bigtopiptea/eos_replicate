<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BanksValidation extends Model
{
    use HasFactory;
    protected $fillable = [
        'biller_id',
        'bank_validation',
    ];

    protected $casts = [
        'bank_validation' => 'array',
    ];

}
