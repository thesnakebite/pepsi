@extends('twill::layouts.form', [
    'contentFieldsetLabel' => 'General',
    'additionalFieldsets' => [
        ['fieldset' => 'blocks', 'label' => 'Blocks'],
    ]
])

@section('contentFields')

    <a17-tabs>
        <a17-tab name="Contenido" :selected="true">
            @formField('input', [
                'name' => 'description',
                'label' => 'Descripción de la página'
            ])
        </a17-tab>

        <a17-tab name="Estilos">
            @formField('color', [
                'name' => 'bg_color',
                'label' => 'Color fondo'
            ])

            <a17-tabs>
                <a17-tab name="Por defecto" :selected="true">
                    @formField('medias', [
                        'name' => 'image_bg_default',
                        'label' => 'Imagen Fondo por defecto',
                        'withVideoUrl' => false,
                        'translated' => false,
                    ])
                </a17-tab>
                <a17-tab name="Móvil">
                    @formField('medias', [
                        'name' => 'image_bg_mobile',
                        'label' => 'Imagen Fondo móvil',
                        'translated' => false
                    ])
                </a17-tab>
            </a17-tabs>
        </a17-tab>
    </a17-tabs>

@stop

@section('fieldsets')
    @formFieldset(['id' => 'blocks', 'title' => 'Blocks'])
        @formField('block_editor', [
            'blocks' => [
                'row'
            ]
        ])
    @endformFieldset

@stop