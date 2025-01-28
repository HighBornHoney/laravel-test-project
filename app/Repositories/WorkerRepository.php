<?php

namespace App\Repositories;

use App\Models\Worker;
use Illuminate\Support\Collection;

class WorkerRepository implements WorkerRepositoryInterface
{
    public function find(int $id): ?Worker
    {
        return Worker::find($id);
    }

    public function getWorkersAvailableForOrderTypes(array $orderTypeIds): Collection
    {
        $workers = Worker::crossJoin('order_types')
            ->leftJoin('workers_ex_order_types', function ($join) {
                $join
                    ->on('order_types.id', '=', 'workers_ex_order_types.order_type_id')
                    ->whereColumn('workers_ex_order_types.worker_id', '=', 'workers.id');
            })
            ->whereIn('order_types.id', $orderTypeIds)
            ->whereNull('workers_ex_order_types.worker_id')
            ->select('workers.*')
            ->get();

        return $workers;
    }
}
