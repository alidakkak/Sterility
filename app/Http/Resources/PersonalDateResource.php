<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonalDateResource extends JsonResource
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
            'date' => $this->date,
            'gender' => $this->gender,
            'country' => $this->country,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
