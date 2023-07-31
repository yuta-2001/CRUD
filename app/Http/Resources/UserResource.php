<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\User
 *
 * @OA\Schema()
 **/
class UserResource extends JsonResource
{
    /**
     * @OA\Property(
     *   property="name",
     *   type="string",
     *   description="user name",
     *   example="yuta"
     * ),
     * @OA\Property(
     *   property="email",
     *   type="email",
     *   description="user email",
     *   example="test@test.com"
     * ),
     * 
     * 
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
