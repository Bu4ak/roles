<?php

namespace Bu4ak\Roles\Traits;

use Bu4ak\Roles\Enum\RoleType;
use Exception;

/**
 * Trait HasRoles.
 */
trait HasRoles
{
    /**
     * @return bool
     * @throws Exception
     */
    public function isAdmin(): bool
    {
        $this->checkRoleIdProp();
        return $this->role_id === RoleType::ADMIN;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function isManager(): bool
    {
        $this->checkRoleIdProp();
        return $this->role_id >= RoleType::MANAGER;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function isUser(): bool
    {
        $this->checkRoleIdProp();
        return $this->role_id === RoleType::USER;
    }

    /**
     * @throws Exception
     */
    private function checkRoleIdProp()
    {
        if (!isset($this->role_id)) {
            throw new Exception('User don\'t has role_id property.');
        }
    }
}
