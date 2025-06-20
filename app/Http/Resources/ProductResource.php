<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "name" => $this->name,
            "product_number" => $this->product_number,
            "barcode" => $this->barcode,
            "category" => $this->category->name,
            "created_at" => $this->created_at->format('d-m-Y'),
            'image' => $this->image ? display_file($this->image) : null,
            'certificate' => $this->certificate ? display_file($this->certificate) : null,
        ];
    }
}