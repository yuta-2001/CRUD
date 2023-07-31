<?php

namespace App\UseCase\User;

use App\Models\User;

class StoreAction
{
    public function __invoke(string $name, string $email, string $password): void
    {
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
    }
}
