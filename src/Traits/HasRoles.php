<?php

namespace Bu4ak\Roles\Traits;

use Bu4ak\Roles\Enum\RoleType;

/**
 * Trait HasRoles.
 */
trait HasRoles
{
    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return RoleType::ADMIN === $this->role_id;
    }

    /**
     * @return bool
     */
    public function isManager(): bool
    {
        return $this->role_id >= RoleType::MANAGER;
    }

    /**
     * @return bool
     */
    public function isUser(): bool
    {
        return RoleType::USER === $this->role_id;
    }
}
