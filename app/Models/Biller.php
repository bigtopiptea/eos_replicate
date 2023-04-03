<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biller extends Model
{
    use HasFactory;
    protected $fillable = [
        'biller_category_id',
        'transaction_type_id',
        'name',
        'provider_id',
        'payment_type',
        'amount_range',
        'fields',
    ];

    public function getBankCode(){
        return $this->hasOne(Maintenance::class, 'meta_value', 'id');
    }

    public function getBankValidation(){

        return $this->hasOne(BanksValidation::class, 'biller_id', 'id');
    }

    public function billerCategoryName()
    {
        return $this->hasOne(Maintenance::class, 'id', 'biller_category_id')->select(['id', 'meta_value', 'meta_id', 'meta_name']);
    }

    public function getProvider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
    public function transactionType()
    {
        return $this->hasOne(Maintenance::class, 'id', 'transaction_type_id')->select(['id', 'meta_id', 'meta_value', 'meta_name']);
    }

    public function serviceFee()
    {
        return $this->hasMany(Fee::class, 'biller_id', 'id')
            ->where('source', 'eos')
            ->select(['id', 'biller_id', 'service_fee', 'currency']);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Manila')->toDateTimeString();
    }
}
