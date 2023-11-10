@component('mail::layout')
    {{-- Preheader --}}
    @isset($preheader)
    @slot('preheader')
        @component('mail::preheader')
            {{$preheader}}
        @endcomponent
    @endslot
    @endisset

    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            @if (isset($logo))
                <img src="{{$logo}}" alt="logo">
            @endif
        @endcomponent
    @endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
