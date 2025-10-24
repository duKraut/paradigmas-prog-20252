<?php

namespace App\Repositories;

use App\Models\User;

class DashboardRepository
{
    public function getAuthenticatedUserWithRelations(User $user)
    {
        return $user->load(['company', 'permissions']);
    }
}
