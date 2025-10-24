<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'message' => 'Bem-vindo ao Dashboard!',
            'user' => [
                'id'   => $this->id,
                'name' => $this->name,
                'type' => $this->type,
            ],
            'company' => $this->company ? [
                'id'     => $this->company->id,
                'name'   => $this->company->name,
                'license_active' => $this->company->license_active,
            ] : null,
            'permissions' => $this->permissions->pluck('name'),
        ];
    }
}
