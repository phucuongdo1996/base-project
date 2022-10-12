<?php

use App\Enums\User\Role;

return [
    'users' => [
        'role' => [
            Role::AdminUser => 'Admin',
            Role::GeneralUser => 'General user',
        ]
    ]
];
