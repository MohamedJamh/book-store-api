<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $roles = [
            'id' => $this->id,
            'name' => $this->name,
            'createdAt' => date_format($this->created_at, 'Y-m-d H:i:s'),
            'updatedAt' => date_format($this->updated_at, 'Y-m-d H:i:s')
        ];
        $permissions = array();
        foreach ($this->permissions as $permission) {
            array_push($permissions,$permission->name);
        }
        $roles['permissions'] = $permissions;
        return $roles;
    }
}
