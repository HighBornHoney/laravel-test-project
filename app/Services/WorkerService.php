<?php

namespace App\Services;

use App\Repositories\WorkerRepositoryInterface;
use Illuminate\Support\Collection;

class WorkerService
{
    public function __construct(
        private WorkerRepositoryInterface $workerRepository,
    ) {
    }

    public function filterByExcludedOrderTypes(array $data): Collection
    {
        $workers = $this->workerRepository->getWorkersAvailableForOrderTypes($data['order_type_ids']);

        if ($workers->isEmpty()) {
            throw new \Exception('Workers not found');
        }

        return $workers;
    }
}
