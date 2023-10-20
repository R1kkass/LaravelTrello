<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TasksResource extends JsonResource
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
            'title'=>$this->title,
            'description'=>$this->description,
            'date'=>$this->created_at->format('d.m.y H:i'),
            'status'=>[
                'id'=>$this->status->id,
                'name'=>$this->status->name
            ],
            'actions'=> ActionsResource::collection($this->actions),
            'tags_keys'=>TagsKeyResource::collection($this->tags_keys)
        ];
    }
}
