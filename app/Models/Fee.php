<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'source',
        'company_id',
        'branch_id',
        'biller_id',
        'amount_range',
        'type_of_fee',
        'currency',
        'service_fee',
        'last_updated_by',
    ];

    protected $casts = [
        'currency' => 'array',
    ];

    public function biller()
    {
        return $this->belongsTo(Biller::class, 'biller_id')->select(['id', 'name', 'biller_category_id', 'transaction_type_id']);
    }

    public function getBranch(){
        return $this->belongsTo(Branch::class, 'branch_id')->select(['id', 'type_of_fee']);
    }

    public function fullname()
    {
        return $this->belongsTo(User::class, 'last_updated_by')->select(['id', 'first_name', 'last_name', 'middle_name', 'role']);
    }

    public function scopeIsEoS($query)
    {
        return $query->where('source', 'eos');
    }

    public function scopeIsSophia($query)
    {
        return $query->where('source', 'sophia');
    }
}
