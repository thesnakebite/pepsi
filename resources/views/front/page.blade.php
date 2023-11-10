@extends('front.layouts.app')


@push('extra_js_head')
    <script src="js/cookieconsent.js"></script>

    @inject('gtm', 'Manifiesto\Promotions\Services\Gtm')
    @if ($gtm->isActive())
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer', @json($gtm->getKey()));</script>
    <!-- End Google Tag Manager -->
    @endif

    @inject('recaptcha', 'Manifiesto\Promotions\Services\Recaptcha')
    @if ($recaptcha->isActive())
    <!-- Google ReCaptcha -->
    <script>
        window.grcptch = @json($recaptcha->getKey());
    </script>
    <!-- Google ReCaptcha -->
    @endif

    {{-- @inject('analytics', 'Manifiesto\Promotions\Services\Analytics')
    @if ($analytics->isActive())
    <!-- Google Analytics -->
    <script>
        window.gakey = @json($analytics->getKey());
    </script>
    <!-- Google Analitycs -->
    @endif --}}
@endpush

@section('content')
@stop


@push('extra_js')
    @include('front.partials.cookieconsent')

    @if ($gtm->isActive())
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=@json($gtm->getKey())"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif
@endpush