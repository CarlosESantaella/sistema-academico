@extends('layouts.layout')
@section('title', 'Home')
@section('content')
<main>
    <div class="container-fluid">
        <form method="POST" action="/students/{{$student->codigo}}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-students.edit.edit-student :student="$student" :responsibles="$responsibles"/>
        </form>
    </div>
</main>
@endsection