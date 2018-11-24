<?php

namespace Bu4ak\Roles\Enum;

/**
 * Class RoleType.
 */
class RoleType
{
    /**
     * Base user role.
     */
    public const USER = 0;

    /**
     * Manager role.
     */
    public const MANAGER = 1;

    /**
     * Admin role. Also has access to mangers routes.
     */
    public const ADMIN = 2;
}
