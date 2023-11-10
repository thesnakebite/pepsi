@extends('twill::layouts.settings', [
    'contentFieldsetLabel' => 'General',
    'additionalFieldsets' => [
        ['fieldset' => 'header', 'label' => 'Header'],
        ['fieldset' => 'footer', 'label' => 'Footer'],
        ['fieldset' => 'container_fields', 'label' => 'Campos para contenedores'],
        ['fieldset' => 'button_primary', 'label' => 'Botón primario'],
        ['fieldset' => 'button_secondary', 'label' => 'Botón secundario'],
        ['fieldset' => 'fonts', 'label' => 'Fuentes']
    ]
])

@section('contentFields')
    <div class="wrapper">
        <div class="col--double col--double-wrap">
            @formField('color', [
                'label' => 'Color por defecto',
                'name' => 'default_color'
            ])

        </div>
        <div class="col--double col--double-wrap">
        </div>
    </div>
@stop

@section('fieldsets')

    @formFieldset(['id' => 'header', 'title' => 'Header'])
        <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('radios', [
                    'name' => 'header_layout',
                    'label' => 'Tipo de layout',
                    'default' => 'standard',
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
                        ],
                    ]
                ])
            </div>
            <div class="col--double col--double-wrap">
                @formField('radios', [
                    'name' => 'header_template',
                    'label' => 'Tipo de template',
                    'default' => 'template-1',
                    'options' => [
                        [
                            'value' => 'template-1',
                            'label' => 'Template 1'
                        ],
                        [
                            'value' => 'template-2',
                            'label' => 'Template 2'
                        ]
                    ]
                ])
          </div>
        </div>

         <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('color', [
                    'label' => 'Color de fondo',
                    'name' => 'header_bg_color'
                ])
            </div>
            <div class="col--double col--double-wrap">
                @formField('color', [
                    'label' => 'Color de texto',
                    'name' => 'header_font_color'
                ])
            </div>
        </div>

    @endformFieldset
   
    @formFieldset(['id' => 'footer', 'title' => 'Footer'])
        <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('radios', [
                    'name' => 'footer_layout',
                    'label' => 'Tipo de layout',
                    'default' => 'standard',
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
                        ],
                    ]
                ])
            </div>
            <div class="col--double col--double-wrap">
                @formField('radios', [
                    'name' => 'footer_template',
                    'label' => 'Tipo de template',
                    'default' => 'template-1',
                    'options' => [
                        [
                            'value' => 'template-1',
                            'label' => 'Template 1'
                        ],
                        [
                            'value' => 'template-2',
                            'label' => 'Template 2'
                        ],
                        [
                            'value' => 'template-3',
                            'label' => 'Template 3'
                        ]
                    ]
                ])
          </div>
        </div>

         <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('color', [
                    'label' => 'Color de fondo',
                    'name' => 'footer_bg_color'
                ])
            </div>
            <div class="col--double col--double-wrap">
                @formField('color', [
                    'label' => 'Color de texto',
                    'name' => 'footer_font_color'
                ])
            </div>
        </div>

        @formField('input', [
            'label' => 'Copyright',
            'name' => 'copyright',
            'textLimit' => '100'
        ])

    @endformFieldset

    @formFieldset(['id' => 'container_fields', 'title' => 'Campos para contenedores'])
        <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('input', [
                    'label' => 'Ancho contenedor Header',
                    'name' => 'header_container_width',
                    'textLimit' => '50'
                ])
            </div>
        </div>
         <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('input', [
                    'label' => 'Ancho contenedor Main',
                    'name' => 'main_container_width',
                    'textLimit' => '50'
                ])
            </div>
        </div>
         <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('input', [
                    'label' => 'Ancho contenedor Footer',
                    'name' => 'footer_container_width',
                    'textLimit' => '50'
                ])
            </div>
        </div>

    @endformFieldset

    @formFieldset(['id' => 'button_primary', 'title' => 'Botón primario'])
        <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('color', [
                    'label' => 'Color de fondo',
                    'name' => 'primary_bg_color'
                ])
            </div>
            <div class="col--double col--double-wrap">
                @formField('color', [
                    'label' => 'Color de texto',
                    'name' => 'primary_text_color'
                ])
            </div>
        </div>

        <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('input', [
                    'label' => 'Border',
                    'name' => 'primary_border',
                    'textLimit' => '80'
                ])
            </div>
            <div class="col--double col--double-wrap">
                @formField('input', [
                    'label' => 'Border Radius',
                    'name' => 'primary_border_radius',
                    'textLimit' => '80'
                ])
            </div>
        </div>
    @endformFieldset

    @formFieldset(['id' => 'button_secondary', 'title' => 'Botón secundario'])
        <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('color', [
                    'label' => 'Color de fondo',
                    'name' => 'secondary_bg_color'
                ])
            </div>
            <div class="col--double col--double-wrap">
                @formField('color', [
                    'label' => 'Color de texto',
                    'name' => 'secondary_text_color'
                ])
            </div>
        </div>

        <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('input', [
                    'label' => 'Border',
                    'name' => 'secondary_border',
                    'textLimit' => '80'
                ])
            </div>
            <div class="col--double col--double-wrap">
                @formField('input', [
                    'label' => 'Border Radius',
                    'name' => 'secondary_border_radius',
                    'textLimit' => '80'
                ])
            </div>
        </div>
    @endformFieldset
   
    @formFieldset(['id' => 'fonts', 'title' => 'Fuentes'])
        <div class="wrapper">
        <div class="col--double col--double-wrap">
            @formField('input', [
                'label' => 'Encabezados #1',
                'name' => 'file_headers_1',
                'textLimit' => '80'
            ])
        </div>
        <div class="col--double col--double-wrap">
            @formField('input', [
                'label' => 'Encabezados #2',
                'name' => 'file_headers_2',
                'textLimit' => '80'
            ])
        </div>
    </div>
  
    <div class="wrapper">
        <div class="col--double col--double-wrap">
            @formField('input', [
                'label' => 'Párrafo #1',
                'name' => 'file_paragraphs_1',
                'textLimit' => '80'
            ])
        </div>
        <div class="col--double col--double-wrap">
            @formField('input', [
                'label' => 'Párrafo #2',
                'name' => 'file_paragraphs_2',
                'textLimit' => '80'
            ])
        </div>
    </div>
    @endformFieldset
@stop