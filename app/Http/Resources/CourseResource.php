<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = 'course';

    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->resource->id,
           'title'=>$this->resource->title,
            'language'=>$this->resource->language,
            'level'=>$this->resource->level,
            'description'=>$this->resource->description,
            'user'=>new UserResource($this->resource->user)
        ];
    }
}
