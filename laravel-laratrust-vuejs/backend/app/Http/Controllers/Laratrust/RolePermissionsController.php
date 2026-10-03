<?php

namespace App\Http\Controllers\Laratrust;


use App\Http\Controllers\ResponseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Resources\RoleResource;
use Illuminate\Support\Facades\Config;
use function Symfony\Component\Routing\Loader\Configurator\collection;
use Illuminate\Support\Facades\Validator;
class RolePermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Role $role)
    {
        $role = Role::with('permissions')->where('id','=', $role->id)->paginate(20);
        return RoleResource::collection($role);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Role $role,Request $request)
    {
        $rules = [
            'permission_id' => 'required'
        ];
        $messages = ['permission_id.required' => 'يرجى اختيار أحذ الأذونات من الخيارات'];
        $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],422);
        } else {
            $role->permissions()->attach([
                $request->permission_id
            ]);
            return ResponseController::dataCreated($role);
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
    public function destroy(Role $role,Permission $permission)
    {
        $role->permissions()->detach([
            $permission->id
        ]);
        return response()->noContent();
    }
}
