<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            // 'image' => $this->whenNotNull(display_file($this->image)),
            'image' => $this->image ? display_file($this->image) : asset('build/assets/no-image.jpeg'),
            'created_at' => $this->created_at->format('d-m-Y'),
        ];
    }
}
