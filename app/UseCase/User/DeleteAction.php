<?php

namespace App\UseCase\User;

use App\Models\User;

class DeleteAction
{
    public function __invoke(int $id): void
    {
        User::findOrFail($id)->delete();
    }
}
