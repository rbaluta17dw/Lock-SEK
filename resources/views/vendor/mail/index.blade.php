@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            LockSEK
        @endcomponent
    @endslot

{{-- Body --}}
@slot('body')
<h2>Bienvenido a LockSEK</h2>
@endslot
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
            © {{ date('Y') }} LockSEK. Todos los derechos reservados.
        @endcomponent
    @endslot
@endcomponent
