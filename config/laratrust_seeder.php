<?php
    return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u',
            'product' => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'carousel' => 'c,r,u,d',
            'roles' => 'c,r,u',
            'permissions' => 'c,r,u',
            'volumes' => 'c,r,u',
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'product' => 'c,r,u,d',
            'category' => 'c,r,u,d',
            'carousel' => 'c,r,u,d',
            'roles' => 'c,r,u',
            'permissions' => 'c,r,u',
            'volumes' => 'c,r,u'
        ],
        'user' => [
            'profile' => 'r,u',
            'product' => 'c,r,u,d',
            'category' => 'c,r,u,d'
        ],
        'customer' => [
            'product' => 'r,o',
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'o' => 'order'
    ]
];
