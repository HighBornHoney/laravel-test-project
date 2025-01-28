<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterByExcludedOrderTypesRequest;
use App\Services\WorkerService;
use Illuminate\Http\JsonResponse;

class WorkerController extends Controller
{
    public function __construct(
        private readonly WorkerService $workerService,
    ) {
    }

    public function filterByExcludedOrderTypes(FilterByExcludedOrderTypesRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $workers = $this->workerService->filterByExcludedOrderTypes($data);
            return response()->json($workers);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
