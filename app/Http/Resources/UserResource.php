<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResource extends ResourceCollection 
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'first_name' => $this->first_name,
        //     'last_name' => $this->last_name,
        //     'email' => $this->email
        // ];
        return ['data' => $this->collection];
    }
}
