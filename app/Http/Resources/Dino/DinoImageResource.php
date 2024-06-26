<?php

namespace App\Http\Resources\Dino;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DinoImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
        ];
    }
}
