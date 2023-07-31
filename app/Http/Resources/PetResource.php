<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Pet
 *
 * @OA\Schema()
 **/
class PetResource extends JsonResource
{
    /**
     * 
     * @OA\Property(
     *   property="id",
     *   type="integer",
     *   description="pet id",
     *   example="1"
     * ),
     * @OA\Property(
     *   property="name",
     *   type="string",
     *   description="pet name",
     *   example="pet"
     * ),
     * 
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
