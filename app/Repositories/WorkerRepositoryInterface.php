<?php

namespace App\Repositories;

use App\Models\Worker;
use Illuminate\Support\Collection;

interface WorkerRepositoryInterface
{
    public function find(int $id): ?Worker;
    public function getWorkersAvailableForOrderTypes(array $orderTypeIds): Collection;
}
