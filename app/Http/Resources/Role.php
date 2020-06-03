<?php

namespace App\Http\Resources;

use App\Http\Resources\Permission as PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Role extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return [

            'id' => $this->id,

            'slug' => $this->slug,

            'label' => $this->label,
            
            'permissions' => PermissionResource::collection($this->permissions)

            
        ];
    }
}
