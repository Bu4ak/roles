<?php

namespace Bu4ak\Roles\Enum;

/**
 * Class RoleType
 * @package Bu4ak\Roles\Enum
 */
class RoleType
{
    /**
     * Base user role
     */
    const USER = 0;

    /**
     * Manager role
     */
    const MANAGER = 1;

    /**
     * Admin role. Also has access to mangers routes
     */
    const ADMIN = 2;
}
