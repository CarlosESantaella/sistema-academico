
    <a 
        href="{{$href}}" 
        class="{{$active ? 'px-2 active': 'px-2 '}} @if($attributes->has('class')){{ $attributes->get('class') }} @endif"
        @if($attributes->has('role'))
        rol="{{ $attributes->get('role') }}" 
        @endif
        @if($attributes->has('data-bs-toggle'))
        data-bs-toggle="{{ $attributes->get('data-bs-toggle') }}"
        @endif
    >
        {{$slot}}
    </a>
