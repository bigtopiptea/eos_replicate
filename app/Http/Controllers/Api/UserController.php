<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, UserPermission};
use App\Http\Requests\Users\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $column = request('column');
        $per_page = request('per_page', 1);
        $sortBy = request('sortBy') == 'true' ? 'ASC' : 'DESC';

        $relationships = ['companyName', 'branchName', 'permissions'];

        $model = User::select('users.*');

        $filter = request('q');

        $filters = $model->where('user_name', 'like', '%' . $filter . '%')
            ->orWhere('first_name', 'like', '%' . $filter . '%')
            ->orWhere('middle_name', 'like', '%' . $filter . '%')
            ->orWhere('last_name', 'like', '%' . $filter . '%')
            ->orWhere('first_name', 'like', '%' . $filter . '%')
            ->orWhereHas('companyName', function ($query) use ($filter) {

                $query->where('name', 'like', '%' . $filter . '%');
            })
            ->orWhereHas('branchName', function ($query) use ($filter) {
                $query->where('name', 'like', '%' . $filter . '%');
            });

        return sortTableByColumn($model, 'users', $column, $sortBy, $per_page, $filters, $relationships, 'companies');
    }

    public function getAPIAccess()
    {
        $user = User::findOrFail('1');
        $data = $user->tokens;
        return $this->sendResponse($data, "All API Access");
    }

    public function checkUserPermission(Request $request)
    {
        $exists = auth()->user()->permissions->whereJsonContains('permissions', $request->get('ability'))->exists();
        return response()->json(["status" => $exists]);
    }

    public function getAuthenthecatedUser()
    {
        $user = auth()->user()->load(['companyName', 'branchName', 'permissions']);
        $user->avatar = $user->avatar ? convertToBase64Image($user->avatar) : null;

        return response()->json($user);
    }

    public function create()
    {
        //
    }

    public function store(UserRequest $request)
    {

        $validatedData = $request->validated();
        $avatar_name = null;

        if ($validatedData['avatar'] != null) {
            $avatar_name = generateImageName($validatedData['avatar']);
            resizeImage($validatedData['avatar']);
        }

        User::transaction(function () use ($request, $validatedData, $avatar_name) {
            $data = array_merge($request->validated(), [
                'role' => $validatedData['role']['label'],
                'branch_id' => $validatedData['branch_id']['value'],
                'company_id' => $validatedData['company_id']['id'],
                'status' => $validatedData['status']['value'] == "1" ? false : true,
                'is_online' => false,
                'avatar' => $avatar_name,
                'password' => Hash::make('asdasd123'),
            ]);

            $user = User::create($data);

            UserPermission::create([
                'user_id' => $user->id,
                'permissions' => collect($request->validated('access'))
            ]);
        });

        return response()->json(['message' => 'User Created Successfully!']);
    }

    public function show(User $user)
    {
        $user = $user->load(['companyName', 'branchName', 'permissions']);
        $user->avatar = $user->avatar ? convertToBase64Image($user->avatar) : null;


        return $this->sendResponse($user, "Success");
    }

    public function edit($id)
    {
        //
    }

    public function update(User $user, UserRequest $request)
    {
        $validatedData = $request->validated();
        $avatar_name = null;
        $imageOrigin = $user->avatar ? convertToBase64Image($user->avatar) : null;

        if ($validatedData['avatar'] != null) {
            if ($validatedData['avatar'] == $imageOrigin) {
                $avatar_name = $user->avatar;
            } else {
                $avatar_name = generateImageName($validatedData['avatar']);
                resizeImage($validatedData['avatar']);
            }
        }

        User::transaction(function () use ($validatedData, $user, $avatar_name) {
            $data = array_merge(
                $validatedData,
                [
                    'branch_id' => $validatedData['branch_id']['value'],
                    'company_id' => $validatedData['company_id']['value'],
                    'status' => $validatedData['status']['value'],
                    'avatar' => $avatar_name ?? null,
                    'role' => $validatedData['role']['label'] ?? $validatedData['role'],
                ]
            );
            $user->update($data);

            UserPermission::updateOrCreate([
                'user_id' => $user->id,
            ], [
                'permissions' => $validatedData['access']
            ]);
        });


        return $this->sendResponse($user, "User Updated Successfully!");
    }

    public function updateUserStatus(User $user)
    {
        $user->status = $user->status == 0 ? 1 : 0;
        $user->save();

        return response()->json(['message' => 'User Status Successfully Updated!']);
    }

    public function destroy($id)
    {
        //
    }
}
