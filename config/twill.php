<?php

return [
    'admin_app_url' => env('APP_URL'),
    'admin_app_path' => 'admin',
    'locale' => 'es',
    'fallback_locale' => 'en',

    'block_editor' => [
        'files' => ['file_markers'],
        'crops' => [
            'image_bg_default' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
            'image_bg_mobile' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
            'image_video_cover' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
            'image_maker' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
            'response_default_image_default' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
            'response_default_image_mobile' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
            'response_success_image_default' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
            'response_success_image_mobile' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
            'response_error_image_default' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
            'response_error_image_mobile' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
        ]
    ],

    'settings' => [
        'crops' => [
            'logo' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
            'favicon' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
            'seo' => [
                'default' => [
                    [
                        'name' => 'default'
                    ],
                ],
            ],
        ],
    ],

     'capsules' => [
        'list' => [
            [
                'name' => 'Pages',
                'enabled' => true
            ],
            [
                'name' => 'MainMenuItems',
                'enabled' => true,
            ],
            [
                'name' => 'FooterMenuItems',
                'enabled' => true,
            ],
        ]
    ]
];
