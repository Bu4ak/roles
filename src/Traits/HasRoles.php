<?php

namespace Bu4ak\Roles\Traits;

use Bu4ak\Roles\Enum\RoleType;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait HasRoles.
 *
 * @property int $role_id
 * @method static Builder admins()
 * @method static Builder managers()
 * @method static Builder users()
 */
trait HasRoles
{
    public function isAdmin(): bool
    {
        return $this->role_id === RoleType::ADMIN;
    }

    public function isManager(): bool
    {
        return $this->role_id >= RoleType::MANAGER;
    }

    public function isUser(): bool
    {
        return $this->role_id >= RoleType::USER;
    }

    public function getRoleIdAttribute(): int
    {
        if (!isset($this->attributes['role_id'])) {
            throw new \RuntimeException("User don't has `role_id` property.");
        }

        return (int)$this->attributes['role_id'];
    }

    public function assignRole(int $roleId): bool
    {
        $this->role_id = $roleId;

        return $this->save();
    }

    public function scopeAdmins(Builder $query)
    {
        return $query->where('role_id', RoleType::ADMIN);
    }

    public function scopeManagers(Builder $query)
    {
        return $query->where('role_id', RoleType::MANAGER);
    }

    public function scopeUsers(Builder $query)
    {
        return $query->where('role_id', RoleType::USER);
    }
}
