<?php

namespace App\Enums\User;

use BenSampo\Enum\Enum;

/**
 * @method static static AdminUser()
 * @method static static GeneralUser()
 */
final class Role extends Enum
{
    const AdminUser = 0;
    const GeneralUser = 1;
}
