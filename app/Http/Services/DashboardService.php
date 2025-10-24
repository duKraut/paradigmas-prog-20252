<?php

namespace App\Services;

use App\Repositories\DashboardRepository;
use App\Models\User;

class DashboardService
{
    protected $repository;

    public function __construct(DashboardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getDashboardData(User $user)
    {
        return $this->repository->getAuthenticatedUserWithRelations($user);
    }
}
