<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class newfavoritesResource extends JsonResource
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
            'post' => new PostResource($this->Post),
        ];
    }
}
