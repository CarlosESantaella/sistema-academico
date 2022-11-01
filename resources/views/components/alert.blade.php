@props(['color', 'message', 'classes'])
<div class="alert alert-{{ $color }} {{ $classes }}" role="alert">
    {{$message}}
</div>
