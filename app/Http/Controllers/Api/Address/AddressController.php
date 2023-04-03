<?php

namespace App\Http\Controllers\API\Address;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct(Country $country, City $city, State $state)
    {
        $this->country = $country;
        $this->city = $city;
        $this->state = $state;
    }

    public function currency()
    {
        $currencies = $this->country->get(['id', 'currency', 'currency_name'])->unique('currency');

        $arr = [];

        foreach ($currencies as $currency) {
            $arr[] = [
                'value' => $currency->id,
                'label' => $currency->currency,
                'currency_name' => $currency->currency_name,
            ];
        }


        return response()->json($arr);
    }
    public function getCountry()
    {
        $countryList = $this->country->all('id', 'name');

        $arr = [];

        foreach ($countryList as $country) {
            $arr[] = [
                "label" => $country->name,
                "value" => $country->id
            ];
        }

        return response()->json($arr);
    }

    public function getStateByCountry(Country $country)
    {
        $state = State::where(['country_id' => $country->id, 'type' => 'state'])->exists();
        $region = State::where(['country_id' => $country->id, 'type' => 'region'])->exists();
        // $noType = State::where(['country_id' => $country->id, 'type' => null])->exists();

        $data = State::where(['country_id' => $country->id, 'type' => $state ? 'state' : ($region ? 'region' : 'null')])->orderBy('name', 'asc')->get(['id', 'country_id', 'name', 'fips_code']);

        $arr = [];

        foreach ($data as $stateList) {
            $arr[] = [
                "label" => $stateList->name,
                "value" => $stateList->id,
                "fips_code" => $stateList->fips_code,
                "country_id" => $stateList->country_id,
            ];
        }

        return response()->json($arr);
    }

    public function getProvinceByRegion($id, $region, $fips_code)
    {
        // $regionFipsCode = State::where(['country_id' => $id, 'type' => 'region'])->get();

        $provinces = State::where(['country_id' => $id, 'fips_code' => $fips_code, 'type' => 'province'])->get(['id', 'name', 'iso2']);

        $arr = [];

        foreach ($provinces as $province) {
            $arr[] = [
                "label" => $province->name,
                "value" => $province->id,
                'iso2' => $province->iso2,
            ];
        }

        return response()->json($arr);
    }

    public function getCityByProvince($iso2)
    {
        $cities = $this->city::where(['state_code' => $iso2])->orderBy('name', 'asc')->get();

        $arr = [];

        foreach ($cities as $city) {
            $arr[] = [
                "label" => $city->name,
                "value" => $city->id
            ];
        }

        return response()->json($arr);
    }
}