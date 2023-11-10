  @twillRepeaterTitle('Columna')
  @twillRepeaterTrigger('+ Columna')
  @twillRepeaterTitleField('width_column')

<a17-tabs>
    <a17-tab name="Contenido" :selected="true">
       @formField('repeater_array', [
            'name' => 'single_blocks',
            'types' => [
                [ 
                    'key' => 'block_button_item',
                    'name' => 'Bloque Botón'
                ],
                [ 
                    'key' => 'block_text_item',
                    'name' => 'Bloque Texto'
                ],
                [ 
                    'key' => 'block_image_item',
                    'name' => 'Bloque Imagen'
                ],
                [ 
                    'key' => 'block_video_item',
                    'name' => 'Bloque Video'
                ],
                [ 
                    'key' => 'block_map_item',
                    'name' => 'Bloque Mapa'
                ],
                [ 
                    'key' => 'block_form_item',
                    'name' => 'Bloque Form'
                ]
            ]
        ]) 
    </a17-tab>

    <a17-tab name="Estilos">

         @formField('checkbox', [
            'name' => 'vertical_blocks',
            'label' => 'Bloques en vertical'
        ])

        <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('select', [
                    'name' => 'width_column',
                    'label' => 'Width columna',
                    'placeholder' => 'Selecciona el width de la columna',
                    'options' => [
                        [
                            'value' => 'col-25',
                            'label' => '25%'
                        ],
                        [
                            'value' => 'col-33',
                            'label' =>  '33%'
                        ],
                        [
                            'value' => 'col-50',
                            'label' => '50%'
                        ],
                        [
                            'value' => 'col-66',
                            'label' => '66%'
                        ],
                        [
                            'value' => 'col-75',
                            'label' => '75%'
                        ],
                        [
                            'value' => 'col-100',
                            'label' => '100%'
                        ],
                    ]
                ])
            </div>

            <div class="col--double col--double-wrap">
                @formField('color', [
                    'name' => 'bg_color',
                    'label' => 'Color fondo'
                ])
            </div>
        </div>



        <a17-tabs>
            <a17-tab name="Por defecto" :selected="true">
                @formField('checkbox', [
                    'name' => 'hide_desktop',
                    'label' => 'Ocultar desktop'
                ])
                <div class="wrapper">
                    <div class="col--double col--double-wrap">
                        @formField('radios', [
                            'name' => 'horizontal_alignment',
                            'label' => 'Alineación horizontal',
                            'default' => 'left',
                            'options' => [
                                [
                                    'value' => 'left',
                                    'label' => 'Izquierda'
                                ],
                                [
                                    'value' => 'center',
                                    'label' => 'Centrado'
                                ],
                                [
                                    'value' => 'right',
                                    'label' => 'Derecha'
                                ],
                            ]
                        ])
                    </div>

                    <div class="col--double col--double-wrap">
                        @formField('radios', [
                            'name' => 'vertical_alignment',
                            'label' => 'Alineación vertical',
                            'default' => 'top',
                            'options' => [
                                [
                                    'value' => 'top',
                                    'label' => 'Superior'
                                ],
                                [
                                    'value' => 'middle',
                                    'label' => 'Centrado'
                                ],
                                [
                                    'value' => 'bottom',
                                    'label' => 'Inferior'
                                ],
                            ]
                        ])
                    </div>
                </div>


                @formField('medias', [
                    'name' => 'image_bg_default',
                    'label' => 'Imagen Fondo por defecto',
                    'withVideoUrl' => false,
                    'translated' => false,
                ])
            </a17-tab>

            <a17-tab name="Móvil">
                @formField('checkbox', [
                    'name' => 'hide_mobile',
                    'label' => 'Ocultar mobile'
                ])
                <div class="wrapper">
                    <div class="col--double col--double-wrap">
                        @formField('radios', [
                            'name' => 'horizontal_alignment_mobile',
                            'label' => 'Alineación horizontal',
                            'default' => 'left',
                            'options' => [
                                [
                                    'value' => 'left',
                                    'label' => 'Izquierda'
                                ],
                                [
                                    'value' => 'center',
                                    'label' => 'Centrado'
                                ],
                                [
                                    'value' => 'right',
                                    'label' => 'Derecha'
                                ],
                            ]
                        ])
                    </div>

                    <div class="col--double col--double-wrap">
                        @formField('radios', [
                            'name' => 'vertical_alignment_mobile',
                            'label' => 'Alineación vertical',
                            'default' => 'top',
                            'options' => [
                                [
                                    'value' => 'top',
                                    'label' => 'Superior'
                                ],
                                [
                                    'value' => 'middle',
                                    'label' => 'Centrado'
                                ],
                                [
                                    'value' => 'bottom',
                                    'label' => 'Inferior'
                                ],
                            ]
                        ])
                    </div>
                </div>



                @formField('medias', [
                    'name' => 'image_bg_mobile',
                    'label' => 'Imagen Fondo móvil',
                    'translated' => false
                ])
            </a17-tab>
        </a17-tabs>
    </a17-tab>

    <a17-tab name="Avanzado">
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