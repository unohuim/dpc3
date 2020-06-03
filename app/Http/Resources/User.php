<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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

            'email' => $this->email,

            'first_name' => $this->first_name,

            'last_name' => $this->last_name,

            'name' => $this->getName(),

            'company' => $this->company

        ];
    }



    public function with($request)
    {

        return [

            'auth_check' => auth()->check(),

        ];
    }
}
