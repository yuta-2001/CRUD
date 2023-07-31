<?php

namespace App\UseCase\Pet;

use App\Models\Pet;

class StoreAction
{
    public function __invoke(string $name, int $userId): void
    {
        Pet::create([
            'name' => $name,
            'user_id' => $userId,
        ]);
    }
}
