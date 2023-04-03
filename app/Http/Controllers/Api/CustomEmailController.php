<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\CustomEmailRequest;
use Illuminate\Http\Request;
use App\Models\CustomEmail;

class CustomEmailController extends BaseController
{
    public function index()
    {
        return $this->sendResponse(CustomEmail::with('user')->get(), "All customized email contents data");
    }

    public function create()
    {
    }

    public function store(CustomEmailRequest $request)
    {
        $content = array_merge($request->validated(), [
            'user_id' => auth()->user()->id,
        ]);

        // dd($content); 

        CustomEmail::create($content);

        return $this->sendResponse('', "Saved successfully");
    }

    public function show(CustomEmail $customEmail)
    {
        return $this->sendResponse($customEmail, "Fetch successfully");
    }

    public function edit($id)
    {
        //
    }

    public function update(CustomEmailRequest $request, CustomEmail $customEmail)
    {
        $customEmail->update($request->validated());

        return $this->sendResponse($customEmail, "Updated successfully");
    }

    public function destroy($id)
    {
        //
    }
}
