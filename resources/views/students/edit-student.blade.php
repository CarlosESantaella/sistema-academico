@extends('components.layouts.layout')
@section('title', 'Home')
@section('content')
<main>
    <div class="container-fluid">
        <x-students.edit.edit-student :student="$student" :responsibles="$responsibles"/>
    </div>
</main>
@endsection