@extends('twill::layouts.settings', [
    'contentFieldsetLabel' => 'General',
    'additionalFieldsets' => [
        ['fieldset' => 'seo', 'label' => 'SEO']
    ]
])

@section('contentFields')
    @formField('medias', [
        'name' => 'logo',
        'label' => 'Logo',
        'withVideoUrl' => false,
        'translated' => false,
    ])

    @formField('medias', [
        'name' => 'favicon',
        'label' => 'Favicon',
        'withVideoUrl' => false,
        'translated' => false,
    ])
@stop

@section('fieldsets')
    @formFieldset(['id' => 'seo', 'title' => 'SEO'])
        
        @formField('input', [
            'label' => 'Título de sitio',
            'name' => 'site_title'
        ])

        @formField('medias', [
            'name' => 'seo',
            'label' => 'Imagen SEO',
            'withVideoUrl' => false,
            'translated' => false,
        ])
    @endformFieldset
@stop