<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\CustomFieldRequest;
use App\Models\{CustomField, Maintenance};
use Illuminate\Http\Request;

class CustomFieldController extends BaseController
{
    private $customField, $maintenance;

    public function __construct(CustomField $customField, Maintenance $maintenance)
    {
        $this->customField = $customField;
        $this->maintenance = $maintenance;
    }


    public function index()
    {
        $data = CustomField::with('fundName')->whereRef($this->maintenance::COLUMN_SOURCE_OF_FUNDS)->paginate(10);
        // dd($data);
        return $this->sendResponse($data, "All custom fields data");
    }

    public function dataEntryIndex()
    {
        $column = request('column');
        $per_page = request('per_page', 1);
        $sortBy = request('sortBy') == 'true' ? 'ASC' : 'DESC';

        $data = $this->customField->allDataEntry()
            ->join('maintenances', 'maintenances.id', '=', 'custom_fields.parent_id')
            ->select('custom_fields.*', 'maintenances.meta_value as transaction_name')
            ->orderBy($column ?? 'id', $sortBy)
            ->get();
        
        $newData = $data->map(function ($row) {
            //getting the fields
            $fields = $row->fields;
            $fields = substr($fields, strpos($fields, '['));
            $array = json_decode($fields, true);

            $result = array_map(function ($item) {
                if ($item['type'] == 'select') {
                    return [
                        'type' => $item['type'],
                        'label' => $item['label'],
                        'require' => $item['require'],
                        'tags' => array_column($item['tags'], 'text')
                    ];
                } else {
                    return [
                        'type' => $item['type'],
                        'label' => $item['label'],
                        'require' => $item['require'],
                    ];
                }
            }, $array);

            return array_merge($row->toArray(), [
                'transaction_name' => $this->maintenance->whereId($row->parent_id)->pluck('meta_value')->first(),
                'fields' => [$result]
            ]);
        })->paginate($per_page);

        return $this->sendResponse($newData, "All custom fields data");
    }

    public function create()
    {
        //
    }

    public function store(CustomFieldRequest $request)
    {
        $data = CustomField::create([
            'parent_id' => $request->validated('source_of_funds')['value'] ?? $request->validated('parent_id'),
            'ref' => $request->validated('ref'),
            'fields' => collect($request->validated('fields')),
        ]);

        return $this->sendResponse($data, "Custom Fields has been added.");
    }

    public function show(CustomField $custom_field)
    {


        if ($custom_field->ref == $this->maintenance::COLUMN_SOURCE_OF_FUNDS) {
            $data = [
                'value' => $custom_field->id,
                'label' => $custom_field->fundName->meta_value,
                'ref' => $custom_field->ref,
                'fund_id' => $custom_field->parent_id,
                'fields' => json_decode($custom_field->fields),
            ];
        }

        $data = [
            'id' => $custom_field->id,
            'transaction_type' => [
                'value' => $custom_field->parent_id,
                'label' => $custom_field->fundName->meta_value,
            ],
            'section_name' => $custom_field->ref,
            'fields' => json_decode($custom_field->fields),
        ];
        return response()->json($data);
    }

    public function edit($id)
    {
        //
    }

    public function update(CustomFieldRequest $request, CustomField $custom_field)
    {
        $custom_field->update($request->validated());
        // dd($custom_field);
        return response()->json(['message' => 'Custom Field updated Successfully!']);
    }

    public function destroy($id)
    {
        //
    }
}
