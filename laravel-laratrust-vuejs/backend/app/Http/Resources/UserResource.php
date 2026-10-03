<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'is_email_verified' => $this->isEmailVerified(),
            // 'is_admin' => $this->isAdmin(),
            'roles' =>  RoleResource::collection($this->roles),
            'permissions' => PermissionResource::collection($this->permissions),
            'userRoles' => $this->UserRoles(),
            'userPermissions' => $this->UserPermissions(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
