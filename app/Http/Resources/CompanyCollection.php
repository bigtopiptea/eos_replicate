<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CompanyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(
                function ($company) {
                    return [
                        'id' => $company->id,
                        'name' => $company->name,
                        'partner_code' => $company->partner_code,
                        'date_added' => $company->date_added,
                        'logo' => $company->logo,
                        'isActive' => $company->isActive,
                    ];
                }
            )
        ];
    }
}