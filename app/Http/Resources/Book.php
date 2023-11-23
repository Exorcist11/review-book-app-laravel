<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
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
            'bookID' => $this->bookID,
            'book_name' => $this->book_name,
            'author_id' => $this->author_id,
            'publisher_id' => $this->publisher_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
