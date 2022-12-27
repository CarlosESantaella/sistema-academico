@extends('layouts.layout')
@section('title', 'listado de estudiantes')
@section('content')


<section class="tw-mt-20 card tw-mx-auto tw-w-[95%] tw-max-w-[400px]  p-3">
    @if ($errors->any())
        <div class="alert alert-danger">
            Ingrese un año.
        </div>
    @endif
    <div class="text-center">
        <form id="formListStudent" action="{{ route('secretary.list-students-export') }}" method="POST">
            @csrf
            <h3>Listado de alumnos</h3>
            <label for="">
                Gestión Académica
                <input type="number" class="form-control d-inline-block tw-w-[130px] tw-ml-3" name="year" value="{{ date('Y') }}" id="">
            </label>
            <input type="hidden" class="value" name="value">
            <input type="hidden" class="type" name="type">
        </form>
    </div>
    <div class="mt-4 pb-3">
        <div class="d-grid gap-2 col-8 mx-auto">
            <button type="button" class="btn btn-primary-custom btn-list-students" data-value="Manana" data-type="turno">Turno Mañana</button>
            <button type="button" class="btn btn-primary-custom mt-2 btn-list-students" data-value="Tarde" data-type="turno">Turno Tarde</button>
            <button type="button" class="btn btn-primary-custom mt-2 btn-list-students" data-value="Noche" data-type="turno">Turno Noche</button>
            <button type="button" class="btn btn-primary-custom mt-2 btn-list-students" data-value="Inicial" data-type="nivel">Nivel Inicial</button>
            <button type="button" class="btn btn-primary-custom mt-2 btn-list-students" data-value="Primario" data-type="nivel">Nivel Primario</button>
            <button type="button" class="btn btn-primary-custom mt-2 btn-list-students" data-value="Secundaria" data-type="nivel">Nivel Secundaria</button>
            <button type="button" class="btn btn-primary-custom mt-2 btn-list-students" data-value="Todos" data-type="todos">Todos los cursos</button>
        </div>
    </div>
</section>
{{-- <div class="text-center pt-3">
    <button class="btn btn-primary-custom">Exportar a Excel</button>
</div> --}}

@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function(){
            $('.btn-list-students').on('click', function(){
                let value = $(this).attr('data-value');
                let type = $(this).attr('data-type');

                $('.value').val(value);
                $('.type').val(type);

                $('#formListStudent').submit();
            });
        });
    </script>    
@endpush