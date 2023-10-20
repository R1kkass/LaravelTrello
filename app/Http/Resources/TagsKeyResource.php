<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagsKeyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'tags'=> [
                'id'=>$this->tags->id,
                'name'=>$this->tags->name,
                'color'=>$this->tags->color
            ]
        ];
    }
}
