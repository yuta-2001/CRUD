<?php

namespace App\UseCase\User;

use App\Models\User;

class UpdateAction
{
    public function __invoke(int $id, string $name, string $email): void
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->update([
            'name' => $name,
            'email' => $email,
        ]);
    }
}
