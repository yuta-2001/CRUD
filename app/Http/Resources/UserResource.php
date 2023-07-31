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
     *   property="id",
     *   type="integer",
     *   description="id",
     *   example="1"
     * ),
     * @OA\Property(
     *   property="name",
     *   type="string",
     *   description="応募経路名",
     *   example="GOOD FOR JOB"
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
