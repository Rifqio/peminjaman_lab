<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'room' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'student' => [
            'profile' => 'r,u',
            'peminjaman' => 'c,r,u,d'
        ],
        'kepala_lab' => [
            'profile' => 'c,r,u',
            'peminjaman' => 'r,u,d'
        ],
        'dosen' => [
            'profile' => 'c,r,u',
            'peminjaman' => 'r,u,d'
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
