<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    public const COLUMN_BANK = 'CBA';
    public const COLUMN_BILLER_CATEGORY = 'BILLER_CATEGORY';
    public const COLUMN_TRANSACTION = 'TRANSACTION_TYPE';
    public const COLUMN_CASH_PICKUP_ANYWHERE = 'OTC';
    public const COLUMN_DOOR_TO_DOOR = 'DTD';
    public const COLUMN_SOURCE_OF_FUNDS = 'SOURCE_OF_FUNDS';

    protected $fillable = ['meta_id', 'meta_name', 'meta_value', 'provider_id'];


    public function scopeIsBank($query)
    {
        $query->where('meta_name', '!=', 'source_of_funds')->where('meta_name', '!=', 'biller_category')->where('meta_name', '!=', 'transaction_type');
    }

    public function biller(){
        return $this->hasMany(Biller::class, 'transaction_type_id', 'id');
    }

    public function getTransactionRate(){

    }

    public function transactionName()
    {
        return $this->belongsTo(Maintenance::class, 'meta_id');
    }

    public function bankTransactionType()
    {
        return $this->belongsTo(Maintenance::class, 'meta_name', 'meta_id');
    }

    public function billerName(){
        return $this->belongsTo(Biller::class, 'meta_value', 'id');
    }

    public function customField(){
        return $this->hasOne(CustomField::class, 'parent_id')->select(['id','parent_id', 'fields']);
    }

    public function filterByColumn($columnName)
    {
        return self::with(['transactionName', 'bankTransactionType'])->
            select(['id', 'meta_id', 'meta_value', 'meta_name'])->where('meta_name', $columnName)->orderBy('meta_id', 'ASC')->get();
    }
}
