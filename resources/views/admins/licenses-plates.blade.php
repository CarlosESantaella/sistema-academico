@extends('layouts.layout')
@section('content')
    <pre>
    {{ $students[0]->student->nombres }}
    </pre>
@endsection