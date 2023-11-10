@twillRepeaterTitle('Bloque botón')
@twillRepeaterTitleField('label_block')
@twillBlockIcon('b-button')

<a17-tabs>
  <a17-tab name="Contenido" :selected="true">

    @formField('input', [
        'name' => 'text_button',
        'label' => 'Texto'
    ])

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
      'fieldValues' => 'page_link',
      'renderForBlocks' => true
    ])

    @formField('browser', [
      'moduleName' => 'pages',
      'name' => 'page_link',
      'label' => 'Página',
      'max' => 1,
    ])
    @endformConnectedFields

    @formConnectedFields([
      'fieldName' => 'type',
      'fieldValues' => 'external_link',
      'renderForBlocks' => true
    ])

      @formField('input', [
        'name' => 'external_link',
        'label' => 'Enlace externo'
      ])
    @endformConnectedFields
  </a17-tab>

   <a17-tab name="Estilos">
      @formField('radios', [
        'name' => 'style_button',
        'label' => 'Estilo botón',
        'default' => 'primary',
        'inline' => true,
        'options' => [
          [
            'value' => 'primary',
            'label' => 'Botón primario'
          ],
          [
            'value' => 'secondary',
            'label' => 'Botón secundario'
          ],
          [
            'value' => 'custom',
            'label' => 'Personalizado'
          ]
        ]
      ])

      @formConnectedFields([
        'fieldName' => 'style_button',
        'fieldValues' => 'custom',
        'renderForBlocks' => true
      ])

         <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('color', [
                    'label' => 'Color de fondo',
                    'name' => 'bg_color'
                ])
            </div>
            <div class="col--double col--double-wrap">
                @formField('color', [
                    'label' => 'Color de texto',
                    'name' => 'text_color'
                ])
            </div>
        </div>

        <div class="wrapper">
            <div class="col--double col--double-wrap">
                @formField('input', [
                    'label' => 'Border',
                    'name' => 'border',
                    'textLimit' => '80'
                ])
            </div>
            <div class="col--double col--double-wrap">
                @formField('input', [
                    'label' => 'Border Radius',
                    'name' => 'border_radius',
                    'textLimit' => '80'
                ])
            </div>
        </div>
     
      @endformConnectedFields

      <a17-tabs>
        <a17-tab name="Por defecto" :selected="true">
            @formField('checkbox', [
                'name' => 'hide_desktop',
                'label' => 'Ocultar desktop'
            ])
        </a17-tab>

        <a17-tab name="Móvil">
            @formField('checkbox', [
                'name' => 'hide_mobile',
                'label' => 'Ocultar mobile'
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