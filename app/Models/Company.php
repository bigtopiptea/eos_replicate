<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'partner_code',
        'type_of_charging',
        'logo',
        'added_by',
        'isActive',
    ];

    public function addedBy(){
        return $this->belongsTo(User::class, 'added_by');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'company_name');
    }

}
