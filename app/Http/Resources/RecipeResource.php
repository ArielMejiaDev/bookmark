<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    public function toArray($request): array
    {
        $result = [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'content' => $this->resource->content,
        ];

        if ($this->resource->relationLoaded('author')) {
            $result['author'] = [
                'id' => $this->resource->author->id,
                'name' => $this->resource->author->name,
            ];
        }

        return $result;
    }
}
