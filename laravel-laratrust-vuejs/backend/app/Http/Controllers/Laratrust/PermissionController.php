<?php
namespace App\Http\Controllers\Laratrust;

use App\Http\Controllers\ResponseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PermissionResource::collection(Permission::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->validated());
        new PermissionResource($permission);
        return ResponseController::dataCreated($permission);
    }

    /**
     * Display the specified resource.
     */
    public function edit(Permission $permission)
    {
        return new PermissionResource($permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        new PermissionResource($permission);
        return ResponseController::dataUpdated($permission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->noContent();
    }
}
