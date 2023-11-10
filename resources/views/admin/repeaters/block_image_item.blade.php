@twillRepeaterTitle('Bloque imagen')
@twillRepeaterTitleField('label_block')
@twillBlockIcon('b-image')


<a17-tabs>
  <a17-tab name="Contenido" :selected="true">
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

      @formField('radios', [
        'name' => 'type',
        'label' => 'Tipo enlace',
        'default' => 'no_link',
        'inline' => true,
        'options' => [
          [
            'value' => 'no_link',
            'label' => 'Sin enlace'
          ],
          [
            'value' => 'page_link',
            'label' => 'Enlace página'
          ],
          [
            'value' => 'external_link_self',
            'label' => 'Enlace externo _self'
          ],
          [
            'value' => 'external_link_blank',
            'label' => 'Enlace externo _blank'
          ]
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
        'fieldValues' => 'external_link_self',
        'renderForBlocks' => true
      ])

        @formField('input', [
          'name' => 'external_link_self',
          'label' => 'Enlace externo'
        ])
      @endformConnectedFields

      @formConnectedFields([
      'fieldName' => 'type',
      'fieldValues' => 'external_link_blank',
      'renderForBlocks' => true
      ])
      
      @formField('input', [
      'name' => 'external_link_blank',
      'label' => 'Enlace externo'
      ])
      @endformConnectedFields
  </a17-tab>

  <a17-tab name="Estilos">
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