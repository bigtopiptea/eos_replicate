<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'class', // remitter or beneficiary
        'customer_type', //I-individual, C-corporate
        'code',
        'last_name',
        'first_name',
        'middle_name',
        'suffix',
        'mobile_number',
        'email',
        'address', //address1
        'country',  //address 2
        'state',  //address 3
        'city',  //address 4
        'zip_code',  //address 5
        'birth_date',  //remitter birthdate // date of incorporation
        'birth_place',  //remitter birth place
        'gender',
        'civil_status',
        'nationality',
        'same_address',
        'same_country',
        'same_state',
        'same_city',
        'same_zip_code',
        'source_of_funds',
        'purpose_of_remittance',
        'relationship_to_the_beneficiary',
        'id_type',
        'id_number',
        'employee_business_nature',
        'employee_business_name',
        'annual_salary',
    ];

    public function getCustomerDetails(){
        return self::all() ;
    }

    public function saveRemitter($remitter)
    {
        return $this->create([
            'class' => 'remitter',
            'customer_type' => 'I',
            'last_name' => $remitter['last_name'],
            'first_name' => $remitter['first_name'],
            'middle_name' => $remitter['middle_name'],
            'suffix' => $remitter['suffix'],
            'mobile_number' => $remitter['mobile_number'],
            'email' => $remitter['email'],
            'address' => $remitter['address'],
            'country' => $remitter['country'],
            'state' => $remitter['state'],
            'city' => $remitter['city'],
            'zip_code' => $remitter['zip_code'],
            'birth_date' => $remitter['birth_date'],
            'birth_place' => $remitter['birth_place'],
            'gender' => $remitter['gender'],
            'civil_status' => $remitter['civil_status'],
            'nationality' => $remitter['nationality'],
            'source_of_funds' => $remitter['source_of_funds'],
            'purpose_of_remittance' => $remitter['purpose_of_remittance'],
            'relationship_to_the_beneficiary' => $remitter['relationship_to_the_beneficiary'],
        ]);
    }
    public function saveBeneficiary($beneficiary)
    {
        return $this->create([
            'class' => 'beneficiary',
            'customer_type' => 'I',
            'last_name' => $beneficiary['last_name'],
            'first_name' => $beneficiary['first_name'],
            'middle_name' => $beneficiary['middle_name'],
            'suffix' => $beneficiary['suffix'],
            'mobile_number' => $beneficiary['mobile_number'],
            'email' => $beneficiary['email'],
            'address' => $beneficiary['address'],
            'country' => $beneficiary['country'],
            'state' => $beneficiary['state'],
            'city' => $beneficiary['city'],
            'zip_code' => $beneficiary['zip_code'],
            'birth_date' => $beneficiary['birth_date'],
            'birth_place' => $beneficiary['birth_place'],
            'gender' => $beneficiary['gender'],
            'civil_status' => $beneficiary['civil_status'],
            'nationality' => $beneficiary['nationality'],
            'same_address' => $beneficiary['same_address'],
            'same_country' => $beneficiary['same_country'],
            'same_state' => $beneficiary['same_state'],
            'same_city' => $beneficiary['same_city'],
            'same_zip_code' => $beneficiary['same_zip_code'],
        ]);
    }
}
