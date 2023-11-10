@twillBlockTitle('Fila')
@twillBlockIcon('flex-grid')
@twillBlockGroup('app')
@twillBlockCompiled('true')


<a17-tabs>
    <a17-tab name="Contenido" :selected="true">
         @formField('repeater', [
            'name' => 'Columna',
            'type' => 'column_item'
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

    <a17-tab name="Avanzado">
        @formField('input', [
            'name' => 'label_block',
            'label' => 'Label',
            'default' => '',
            'maxlength' => 100,
        ])

        @formField('radios', [
            'name' => 'type',
            'label' => 'Tipo de fila',
            'default' => 'standard',
            'inline' => true,
            'options' => [
                [
                    'value' => 'standard',
                    'label' => 'Standard'
                ],
                [
                    'value' => 'full-boxed',
                    'label' => 'Full boxed'
                ],
                 [
                    'value' => 'full-width',
                    'label' => 'Full width'
                ]
            ]
        ])

        <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('input', [
                'name' => 'html_id',
                'label' => 'ID',
                'maxlength' => 250
                ])
            </div>
            <div class="col--double col--double-wrap">
                @formField('input', [
                'name' => 'html_class',
                'label' => 'Class',
                'maxlength' => 500
                ])
            </div>
        </div>
    </a17-tab>
</a17-tabs>