<?php

namespace App\Http\Controllers\Laratrust;

use App\Http\Controllers\ResponseController;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;

class UserPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $roles = User::with('permissions')->where('id' , '=' , $user->id);
        return UserResource::collection($roles->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user,Request $request)
    {
        $rules = [
            'permission_id' => 'required'
        ];
        $messages = ['permission_id.required' => 'يرجى اختيار أحذ الأذونات من الخيارات'];
        $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],422);
        } else {
            $user->permissions()->attach([
                $request->permission_id
            ]);
            return ResponseController::dataCreated($user);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Permission $permission)
    {
        $user->permissions()->detach([
            $permission->id
        ]);
        return response()->noContent();
    }
}
