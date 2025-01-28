<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function find(int $orderId): ?Order
    {
        return Order::find($orderId);
    }

    public function create(array $data): Order
    {
        $order = Order::create([
            'type_id' => $data['type_id'],
            'partnership_id' => $data['partnership_id'],
            'user_id' => $data['user_id'],
            'description' => $data['description'] ?? null,
            'date' => $data['date'],
            'address' => $data['address'],
            'amount' => $data['amount'],
            'status' => $data['status'],
        ]);

        return $order;
    }
}
