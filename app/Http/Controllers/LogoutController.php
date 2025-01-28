<?php

namespace App\Http\Controllers;

use App\Services\LogoutService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct(
        private readonly LogoutService $logoutService,
    ) {
    }

    public function logout(Request $request): JsonResponse
    {
        try {
            $revokedTokensCount = $this->logoutService->logout($request);
            return response()->json([
                'revoked_count' => $revokedTokensCount,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
