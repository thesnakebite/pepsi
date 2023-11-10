@twillRepeaterTitle('Bloque video')
@twillRepeaterTitleField('label_block')
@twillBlockIcon('b-video')


<a17-tabs>
    <a17-tab name="Contenido" :selected="true">
      @formField('medias', [
          'name' => 'image_video_cover',  // role
          'label' => 'Video cover',
          'translated' => false,
      ])

      @formField('input', [
        'name' => 'external_link',
        'label' => 'Video',
        'maxlength' => 250
      ])

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