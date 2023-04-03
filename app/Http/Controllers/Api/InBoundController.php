<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Rate;


class InBoundController extends BaseController
{
    public function fees(Request $request, $id)
    {
        if (!auth()->user()->tokenCan('maintenance:post,put')) {
            return $this->unauthorizedResponse();
        }

        $data = Fee::findOrFail($id)->update([
            'type_of_fee' => $request->type_of_fee,
            'service_fee' => $request->input('amount'),
            'last_updated_by' => $request->input('user_id'),
        ]);
        return $this->sendResponse($data, "Fee updated.");
    }

    public function rates(Request $request, $id)
    {
        if (!auth()->user()->tokenCan('maintenance:post,put')) {
            return $this->unauthorizedResponse();
        }

        $data = Rate::findOrFail($id)->update([
            'rate' => $request->input('amount'),
            'last_update_by' => $request->input('user_id'),
        ]);
        return $this->sendResponse($data, "Rate updated.");
    }
}
