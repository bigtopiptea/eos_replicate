<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HandlingFee extends Model
{
    use HasFactory;
    protected $fillable  = [
        'tie_up',
        'transaction_type_id',
        'biller_id',
        'currency',
        'service_fee',
        'last_updated_by',
    ];
    public function transactionType(){
        return $this->hasOne(Maintenance::class, 'id', 'transaction_type_id');
    }

    public function getUser(){
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function getBiller(){
        return $this->hasOne(Biller::class, 'id', 'biller_id');
    }

    public function getCompany(){
        return $this->hasOne(Company::class, 'id', 'tie_up');
    }
}
