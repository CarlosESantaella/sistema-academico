@extends('components.layouts.layout')
@section('title', 'Home')
@section('content')
<main>
    <div class="container">
        <x-students.edit-student :id="$id"/>
    </div>
</main>
@endsection