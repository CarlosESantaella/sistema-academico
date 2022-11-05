@extends('layouts.layout')
@section('content')
    <h1>ah Compadree!! Dios te bendiga y te guarde siempre compatriota.</h1>
    @foreach($students as $student)
        <pre>
        {{ $student->licenses_plates()->get() }}
        </pre>

    @endforeach
@endsection