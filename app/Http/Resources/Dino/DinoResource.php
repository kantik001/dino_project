<?php

namespace App\Http\Resources\Dino;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DinoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return [
//            'id' => $this->id,
//            'price' => $this->price,
//            'name' => $this->name,
//            'description' => $this->description,
//            'categories' => $this->categories,
//            'discount' => $this->discount,
//            'created_at' => $this->created_at->toDateString(),
//
//            'path' => $this->path,
//            'url' => $this->url,
//        ];
        return parent::toArray($request);
    }
}
