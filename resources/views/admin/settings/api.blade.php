@extends('twill::layouts.settings', [
    'contentFieldsetLabel' => 'Google Maps',
    'additionalFieldsets' => [
        ['fieldset' => 'recaptcha', 'label' => 'Google Recaptcha v3'],
        ['fieldset' => 'marketing', 'label' => 'Google Marketing'],
        // ['fieldset' => 'artesanosdelsabor', 'label' => 'Artesanosdelsabor'],
    ]
])

@section('contentFields')
    @formField('input', [
        'label' => 'Key',
        'name' => 'google_maps_key'
    ])
@stop

@section('fieldsets')
    @formFieldset(['id' => 'recaptcha', 'title' => 'Google Recaptcha v3'])
        
        @formField('input', [
            'label' => 'Key',
            'name' => 'google_recaptcha_key'
        ])
        @formField('input', [
            'label' => 'Secret',
            'name' => 'google_recaptcha_secret'
        ])
    @endformFieldset

    @formFieldset(['id' => 'marketing', 'title' => 'Google Marketing'])

    @formField('radios', [
        'label' => 'Google Marketing Type',
        'name' => 'google_marketing_type',
        'default' => 'google_gtm_key',
        'inline' => true,
        'options' => [
            [
                'value' => 'google_gtm_key',
                'label' => 'GTM'
            ],
            [
                'value' => 'google_analytics_key',
                'label' => 'GA4'
            ]
        ]
    ])

    @formField('input', [
        'label' => 'Key',
        'name' => 'google_marketing_key'
    ])
    
    @endformFieldset
    
    {{-- @formFieldset(['id' => 'artesanosdelsabor', 'title' => 'Artesanosdelsabor'])
        
        @formField('input', [
            'label' => 'Key',
            'name' => 'artesanosdelsabor_key'
        ])
    @endformFieldset --}}
@stop