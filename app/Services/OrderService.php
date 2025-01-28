<?php

namespace App\Services;

use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\WorkerRepositoryInterface;
use Illuminate\Http\Request;

class OrderService
{
    public function __construct(
        private OrderRepositoryInterface $orderRepository,
        private WorkerRepositoryInterface $workerRepository,
    ) {
    }

    public function store(Request $request, array $data): Order
    {
        $userId = $request->user()->id;

        $data['user_id'] = $userId;

        $order = $this->orderRepository->create($data);

        return $order;
    }

    public function assignWorkerToOrder(int $orderId, array $data): void
    {
        $order = $this->orderRepository->find($orderId);

        if ($order === null) {
            throw new \Exception('Order not found');
        }

        $worker = $this->workerRepository->find($data['worker_id']);

        if ($worker === null) {
            throw new \Exception('Worker not found');
        }

        $excludedOrderTypes = $worker->excludedOrderTypes->pluck('id')->toArray();

        if (in_array($order->type_id, $excludedOrderTypes)) {
            throw new \Exception('The worker cannot be assigned to this order type because they have excluded it');
        }

        $order->workers()->attach($data['worker_id'], ['amount' => $data['amount']]);
    }
}
