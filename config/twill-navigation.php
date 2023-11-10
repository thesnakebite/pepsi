<?php


return [  
     'settings' => [
        'title' => 'Configuración',
        'route' => 'admin.settings',
        'params' => ['section' => 'general'],
        'primary_navigation' => [
            'general' => [
                'title' => 'General',
                'route' => 'admin.settings',
                'params' => ['section' => 'general']
            ],
            'styles' => [
                'title' => 'Estilos',
                'route' => 'admin.settings',
                'params' => ['section' => 'styles']
            ],
            'socials' => [
                'title' => 'Socials',
                'route' => 'admin.settings',
                'params' => ['section' => 'socials']
            ],
            'api' => [
                'title' => 'API',
                'route' => 'admin.settings',
                'params' => ['section' => 'api']
            ]
        ]
    ],   
      
    'pages' => [
        'can' => 'edit',
        'title'     => 'Páginas',
        'module'    => true
    ],

    'menus' => [
        'can' => 'edit',
        'title' => 'Menus',
        'route' => 'admin.menus.mainMenuItems.index',
        'primary_navigation' => [
            'mainMenuItems' => [
               'title' => 'Menu Principal',
                'module' => true,
            ],
            'footerMenuItems' => [
                'title' => 'Menu Footer',
                'module' => true,
            ],
       ],
    ],
];