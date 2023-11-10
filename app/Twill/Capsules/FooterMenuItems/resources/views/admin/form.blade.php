@extends('twill::layouts.form')

@section('contentFields')
   @formField('radios', [
    'name' => 'type',
    'label' => 'Tipo enlace',
    'default' => 'page_link',
    'inline' => true,
    'options' => [
        [
            'value' => 'page_link',
            'label' => 'Enlace página'
        ],
        [
            'value' => 'external_link',
            'label' => 'Enlace externo'
        ],
    ]
])
            
@formConnectedFields([
    'fieldName' => 'type',
    'fieldValues' => 'page_link'
    ])

@formField('browser', [
    'moduleName' => 'pages',
    'routePrefix' => '',
    'name' => 'pages',
    'label' => 'Página',
    'max' => 1,
    ])
@endformConnectedFields


@formConnectedFields([
    'fieldName' => 'type',
    'fieldValues' => 'external_link'
])

    @formField('input', [
    'name' => 'url_link',
    'label' => 'Enlace externo'
    ])
@endformConnectedFields


@stop 
