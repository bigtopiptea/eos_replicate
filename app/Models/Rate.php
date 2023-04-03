<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'source',
        'branch_id',
        'currency_from',
        'currency_to',
        'rate',
        'last_update_by',
    ];

    public function fromCurrency()
    {
        return $this->belongsTo(Country::class, 'currency_from')->select(['id', 'currency']);
    }
    public function toCurrency()
    {
        return $this->belongsTo(Country::class, 'currency_to')->select(['id', 'currency']);
    }
    public function fullname()
    {
        return $this->belongsTo(User::class, 'last_update_by')->select(['id', 'first_name', 'last_name', 'role']);
    }
    public function branchName()
    {
        return $this->belongsTo(Branch::class, 'branch_id')->select(['id', 'name', 'currency']);
    }
    public function biller(){
        return $this->hasOne(Biller::class, 'biller_id');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Manila')->toDateTimeString();
    }

    public function scopeIsEos($query){
        return $query->where('source', 'eos');
    }
}
