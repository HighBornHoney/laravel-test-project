<?php

namespace App\Services;

use App\Repositories\SessionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SessionService
{
    public function __construct(
        private SessionRepositoryInterface $sessionRepository,
    ) {
    }

    public function getActiveSessions(Request $request): Collection
    {
        $userId = $request->user()->id;

        $sessions = $this->sessionRepository->getAllByUserId($userId);

        if ($sessions->isEmpty()) {
            throw new \Exception('There are no sessions');
        }

        return $sessions;
    }

    public function deleteSession(Request $request, string $id): int
    {
        $session = $this->sessionRepository->find($id);

        if ($session === null) {
            throw new \Exception('Session not found');
        }

        $userId = $request->user()->id;

        if ($session->user_id !== $userId) {
            throw new \Exception("You can't delete the session of another user, don't even try");
        }

        $deletedRows = $this->sessionRepository->deleteById($id);

        if ($deletedRows <= 0) {
            throw new \Exception('Session was not deleted');
        }

        return $deletedRows;
    }
}
