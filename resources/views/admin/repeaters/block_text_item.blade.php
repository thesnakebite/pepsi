@twillRepeaterTitle('Bloque texto')
@twillRepeaterTitleField('label_block')
@twillBlockIcon('text')



<a17-tabs>
    <a17-tab name="Contenido" :selected="true">
      @formField('wysiwyg', [
        'name' => 'body',
        'label' => 'Cuerpo',
        'toolbarOptions' => [
          ['header' => [2, 3, 4, 5, 6, false]],
          'bold',
          'italic',
          'underline',
          'strike',
          ["color" =>  [ "#000000", "#e60000", "#ff9900", "#ffff00", "#008a00", "#0066cc", "#9933ff", "#ffffff", "#facccc", "#ffebcc", "#ffffcc", "#cce8cc", "#cce0f5", "#ebd6ff", "#bbbbbb", "#f06666", "#ffc266", "#ffff66", "#66b966", "#66a3e0", "#c285ff", "#888888", "#a10000", "#b26b00", "#b2b200", "#006100", "#0047b2", "#6b24b2", "#444444", "#5c0000", "#663d00", "#666600", "#003700", "#002966", "#3d1466", ]],
          ["script" => "super"],
          ["script" => "sub"],
          "blockquote",
          "code-block",
          ['list' => 'ordered'],
          ['list' => 'bullet'],
          ['indent' => '-1'],
          ['indent' => '+1'],
          ["align" => []],
          ["direction" => "rtl"],
          'link',
          "clean",
        ],
        'placeholder' => 'Añade texto',
        'maxlength' => 200,
        'editSource' => true,
        'note' => 'Hint message`',
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