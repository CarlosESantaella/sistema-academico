@extends('layouts.layout')
@section('title', 'Home')
@section('content')
<main>
    <div class="container-fluid">
        <x-alert color="success" message="Alumno actualizado correctamente!" classes="mt-4 text-center" />
        <form method="POST" action="/students/{{$student->codigo}}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-students.edit.edit-student :student="$student" :responsibles="$responsibles"/>
        </form>
    </div>
</main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){

            setTimeout(() => {
                $('.alert').slideUp();
            }, 3000);

        })
    </script>
@endpush