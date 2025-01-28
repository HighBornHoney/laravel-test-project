<?php

namespace App\Repositories;

use App\Models\Session;
use Illuminate\Support\Collection;

interface SessionRepositoryInterface
{
    public function find(string $id): ?Session;

    public function getAllByUserId(int $userId): Collection;

    public function deleteById(string $id): int;
}
