<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = [
        'parent_id',
        'ref',
        'fields',
    ];

    //maintenanceName or label
    public function fundName()
    {
        return $this->belongsTo(Maintenance::class, 'parent_id', 'id')->select(['id', 'meta_value']);
    }

    public function allDataEntry()
    {
        return self::where('ref', '!=', Maintenance::COLUMN_SOURCE_OF_FUNDS);
    }
    public function saveSourceOfFundFields($request, $parent)
    {
        return $this->create([
            'parent_id' => $parent->id,
            'code' => 'transaction-source-of-fund',
            'fields' => collect($request->source_of_fund_fields),
        ]);
    }
    public function saveBillerFields($request, $parent)
    {
        return $this->create([
            'parent_id' => $parent->id,
            'code' => 'transaction-biller',
            'fields' => collect($request->biller_fields),
        ]);
    }
}
