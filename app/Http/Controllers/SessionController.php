<?php

namespace App\Http\Controllers;

use App\Services\SessionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct(
        private readonly SessionService $sessionService,
    ) {
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $sessions = $this->sessionService->getActiveSessions($request);
            return response()->json($sessions);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Request $request, string $id): JsonResponse
    {
        try {
            $deletedRows = $this->sessionService->deleteSession($request, $id);
            return response()->json([
                'deletedRows' => $deletedRows,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
