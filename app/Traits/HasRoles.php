<?php

namespace App\Traits;

use App\Models\Role;

trait HasRoles
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function hasRole(string $role): bool
    {
        return $this->roles()->where('name', $role)->exists();
    }

    public function assignRole(string $role): void
    {
        $roleModel = Role::where('name', $role)->first();
        if ($roleModel && !$this->hasRole($role)) {
            $this->roles()->attach($roleModel->id);
        }
    }

    public function removeRole(string $role): void
    {
        $roleModel = Role::where('name', $role)->first();
        if ($roleModel) {
            $this->roles()->detach($roleModel->id);
        }
    }

    public function getActiveRole(): ?string
    {
        return session('active_role');
    }

    public function setActiveRole(string $role): void
    {
        if ($this->hasRole($role)) {
            session(['active_role' => $role]);
        }
    }
}
