<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class likeResource extends JsonResource
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
            'user' => new UserResource($this->User),
            'type' => $this->type,
            'type_id' => $this->type_id,

        ];
    }
}
