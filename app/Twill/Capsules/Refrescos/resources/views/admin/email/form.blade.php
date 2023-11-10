
@extends('twill::layouts.form', [
    'contentFieldsetLabel' => 'Contenido',
    'additionalFieldsets' => [
        ['fieldset' => 'test', 'label' => 'Test']
    ]
])
@section('contentFields')

     @formField('select', [
        'name' => 'type',
        'label' => 'Tipo',
        'placeholder' => 'Selecciona',
        'options' => [
            [
                'value' => 'winners',
                'label' => 'Ganadores'
            ]
        ]
    ])

    @formField('input', [
        'name' => 'subject',
        'label' => 'Asunto',
        'maxlength' => 100
    ])

    @formField('input', [
        'name' => 'preheader',
        'label' => 'Preheader',
        'maxlength' => 100
    ])

    @formField('wysiwyg', [
        'name' => 'body',
        'label' => 'Cuerpo',
        'toolbarOptions' => [
          ['header' => [2, 3, 4, 5, 6, false]],
          'bold',
          'italic',
          'underline',
          'strike',
          ["color" => []],
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


    @section('fieldsets')
        @formFieldset(['id' => 'test', 'title' => 'Test'])
            <a17-emailtest>
                @formField('input', [
                    'name' => 'test_email',
                    'label' => 'Email',
                    'maxlength' => 100
                ])
            </a17-emailtest>
        @endformFieldset
    @stop

@stop
