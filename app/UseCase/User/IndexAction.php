<?php

namespace App\UseCase\User;

use App\Models\User;

class IndexAction
{
    public function __invoke(): \Illuminate\Database\Eloquent\Collection
    {
        return User::select('id', 'name', 'email')->get();
    }
}
