@extends('twill::layouts.form', [
    'contentFieldsetLabel' => isset($item->video) ? 'Vídeo' : 'Content'
])


@section('contentFields')
    <div style="margin-top: 30px;">
        @if (isset($item->video))
        <video width="600" controls>
            <source src="{{ config('app.url') . '/'. $item->video }}">
        </video>
        @endif
    </div>
@stop
