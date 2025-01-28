<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignWorkerToOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(
        private readonly OrderService $orderService,
    ) {
    }

    public function store(StoreOrderRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $order = $this->orderService->store($request, $data);
            return response()->json($order, 201);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function assignWorkerToOrder(AssignWorkerToOrderRequest $request, $orderId): JsonResponse
    {
        try {
            $data = $request->validated();
            $this->orderService->assignWorkerToOrder($orderId, $data);
            return response()->json([
                'message' => 'Worker successfully assigned to the order'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
