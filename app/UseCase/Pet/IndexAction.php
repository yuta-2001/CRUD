<?php

namespace App\UseCase\Pet;

use App\Models\Pet;

class IndexAction
{
    public function __invoke(?int $userId): \Illuminate\Database\Eloquent\Collection
    {
        return Pet::select('id', 'name')
                ->when($userId, function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->get();
    }
}
