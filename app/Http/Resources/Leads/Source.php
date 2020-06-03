<?php

namespace App\Http\Resources\Leads;

use Illuminate\Http\Resources\Json\JsonResource;

class Source extends JsonResource
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

            'name' => $this->name,

            'type' => $this->type   

            
        ];
    }
}
