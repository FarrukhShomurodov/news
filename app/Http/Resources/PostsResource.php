<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
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
            'title' => $this->title,
            "title_description" => $this->title_description,
            'category_id' => $this->category_id,
            'tags' => $this->tags,
            'description' => $this->description,
            'title_image'=> $this->title_image,
        ];
    }
}
