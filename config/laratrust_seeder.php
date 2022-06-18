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
        'student' => [
            'profile' => 'r,u',
            'peminjaman' => 'c,r,u,d',
            'bebas_lab' => 'c,r,u,d',
        ],
        'guest' => [
            'profile' => 'r,u',
            'uji_sampel' => 'c,r,u,d'
        ],
        'dosen' => [
            'profile' => 'c,r,u',
            'peminjaman' => 'r,u',
            'bebas_lab' => 'r,u'
        ],
        'admin' => [
            'peminjaman' => 'r,u',
            'profile' => 'r,u',
            'bebas_lab' => 'r,u'
        ],
        'kepala_lab' => [
            'profile' => 'c,r,u',
            'peminjaman' => 'r,u',
            'bebas_lab' => 'r,u'
        ],
        'super_admin' => [
            'user' => 'c,r,u,d',
            'peminjaman' => 'c,r,u,d',
            'bebas_lab' => 'c,r,u,d',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
