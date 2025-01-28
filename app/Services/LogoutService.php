<?php

namespace App\Services;

use Illuminate\Http\Request;

class LogoutService
{
    public function logout(Request $request): int
    {
        $revokedTokensCount = 0;

        $request->user()->tokens()->each(function ($token) use (&$revokedTokensCount) {
            $token->revoke();
            $revokedTokensCount++;
        });

        if ($revokedTokensCount === 0) {
            throw new \Exception('No tokens found');
        }

        return $revokedTokensCount;
    }
}
