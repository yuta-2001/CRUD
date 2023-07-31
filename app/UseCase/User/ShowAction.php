<?php

namespace App\UseCase\User;

use App\Models\User;

class ShowAction
{
    public function __invoke(int $id): User
    {
        return User::where('id', $id)->select('id', 'name', 'email')->firstOrFail();
    }
}
