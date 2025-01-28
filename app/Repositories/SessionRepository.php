<?php

namespace App\Repositories;

use App\Models\Session;
use Illuminate\Support\Collection;

class SessionRepository implements SessionRepositoryInterface
{
    public function find(string $id): ?Session
    {
        return Session::find($id);
    }

    public function getAllByUserId(int $userId): Collection
    {
        return Session::where('user_id', $userId)->get();
    }

    public function deleteById(string $id): int
    {
        return Session::destroy($id);
    }
}
