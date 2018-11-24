<?php

namespace Bu4ak\Roles\Traits;

use Bu4ak\Roles\Enum\RoleType;
use Exception;

/**
 * Trait HasRoles.
 *
 * @property int $role_id
 */
trait HasRoles
{
    /**
     * @throws Exception
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role_id === RoleType::ADMIN;
    }

    /**
     * @throws Exception
     *
     * @return bool
     */
    public function isManager(): bool
    {
        return $this->role_id >= RoleType::MANAGER;
    }

    /**
     * @throws Exception
     *
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->role_id === RoleType::USER;
    }

    public function getRoleIdAttribute(): int
    {
        if (!isset($this->attributes['role_id'])) {
            throw new \RuntimeException("User don't has `role_id` property.");
        }

        return (int)$this->attributes['role_id'];
    }
}
