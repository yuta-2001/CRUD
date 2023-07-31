<?php

namespace App\UseCase\User;

use App\Mail\StoreUser;
use App\Models\User;
use Mail;

class StoreAction
{
    public function __invoke(string $name, string $email, string $password): void
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        Mail::to($user)->queue(new StoreUser($user));
    }
}
