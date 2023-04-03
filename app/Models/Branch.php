<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'branch_id',
        'type_of_charging',
        'type_of_fee',
        'contact_number',
        'address',
        'country',
        'region',
        'province',
        'city',
        'currency',
        'reference_number',
        'zip_code',
        'user_id',
        'logo',
    ];

    protected $table = 'branches';

    public function companyName()
    {
        return $this->hasOne(Company::class, 'id', 'company_id')->select(['id', 'name', 'partner_code']);
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country')->select(['id', 'name']);
    }

    public function region()
    {
        return $this->hasOne(State::class, 'id', 'region')->select(['id', 'country_id', 'fips_code', 'name']);
    }

    public function province()
    {
        return $this->hasOne(State::class, 'id', 'province')->select(['id', 'country_id', 'iso2', 'name']);
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city')->select(['id', 'name']);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function countryName()
    {
        return $this->belongsTo(Country::class, 'country')->select(['id', 'name']);
    }
    public function stateName()
    {
        return $this->belongsTo(State::class, 'state', 'id')->select(['id','name']);
    }
    public function regionName()
    {
        return $this->belongsTo(State::class, 'region', 'id')->select(['id','name']);
    }
    public function provinceName()
    {
        return $this->belongsTo(State::class, 'province', 'id')->select(['id','name']);
    }
    public function cityName()
    {
        return $this->belongsTo(City::class, 'city')->select(['id', 'name']);
    }
    public function currency($id)
    {
        return Country::select('currency')->where('id', $id)->first();
    }
    public function currencyUsed($id, $type)
    {
        $data = Rate::where('currency_from',$id)->where('branch_id', $this->id)->first();
        return $type == 'single' ? $this->currency($data->currency_from)->currency : $this->currency($data->currency_from)->currency .' - '. $this->currency($data->currency_to)->currency;
    }



}
