@extends('components.layouts.layout')
@section('title', 'Home')
@section('content')
<main>
    <div class="container-fluid">
        <x-students.edit.edit-student :id="$id"/>
    </div>
</main>
@endsection