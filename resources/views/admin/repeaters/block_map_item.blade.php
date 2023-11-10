@twillRepeaterTitle('Bloque map')
@twillRepeaterTitleField('label_block')
@twillBlockIcon('location')



<a17-tabs>
    <a17-tab name="Contenido" :selected="true">

      @formField('input', [
        'name' => 'google_maps_id',
        'label' => 'Google Maps ID'
      ])

      @formField('radios', [
        'name' => 'type_font',
        'label' => 'Fuente Marcadores',
        'default' => 'api',
        'inline' => true,
        'options' => [
          [
            'value' => 'api',
            'label' => 'API'
          ],
          [
            'value' => 'csv',
            'label' => 'Archivo CSV'
          ],
        ]
      ])

      @formConnectedFields([
        'fieldName' => 'type_font',
        'fieldValues' => 'api',
        'renderForBlocks' => true
      ])

       @formField('input', [
        'name' => 'api_url',
        'label' => 'URL'
      ])
    @endformConnectedFields
    
    @formConnectedFields([
        'fieldName' => 'type_font',
        'fieldValues' => 'csv',
        'renderForBlocks' => true
      ])

      @formField('files', [
          'name' => 'file_markers',
          'label' => 'Files',
          'max' => 4,
          'note' => 'Archivos CSV'
      ])
    @endformConnectedFields

    </a17-tab>

    <a17-tab name="Estilos">
      
      @formField('wysiwyg', [
        'name' => 'styles',
        'label' => 'Estilos de mapa',
        'toolbarOptions' => [
          "code-block",
          "clean"
        ],
        'placeholder' => 'Añade estilo',
        'maxlength' => 500,
        'editSource' => true,
      ])

      @formField('medias', [
        'name' => 'image_maker',
        'label' => 'Marcador',
        'fieldNote' => 'Imagen tipo JPEG/PNG'
      ])

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