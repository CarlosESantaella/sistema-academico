@extends('layouts.layout')
@section('title', 'lista de cursos')
@push('styles')
    <style>
        .coursesSelect.selected{
            color: white;
            background: var(--color-primary);
        }

    </style>
@endpush
@section('content')
    <section class="tw-mt-20 card tw-mx-auto tw-w-[95%] tw-max-w-[700px]  p-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                Seleccione un curso e ingrese un año.
            </div>
        @endif
        <div>
            <form id="formCourseExport" action="{{ route('secretary.lists-by-course-export') }}" method="POST">
                @csrf
                <label for="">
                    Gestión Académica
                    <input type="number" class="form-control d-inline-block tw-w-[130px] tw-ml-3" name="year" value="{{ date('Y') }}" id="">
                </label>
                <input type="hidden" class="courseId" name="course">
            </form>
        </div>
        <div class="mt-3">
            <section class="w-100 tw-overflow-y-auto tw-h-[500px] tw-bg-gray-50 p-2 tw-divide-y" id="">
                @foreach($courses as $course)
                    <div class="py-2 tw-cursor-pointer coursesSelect px-2" data-course="{{ $course->codigo }}">
                        <p class="border d-inline-block px-4 py-1 m-0">
                            {{ $course->gnumeral }} "{{ $course->paralelo }}"
                        </p>
                        <span>
                            <strong class="tw-font-bold">Nivel: </strong>
                            {{ $course->nivel }}
                        </span>
                        <span>
                            <strong>Turno: </strong>
                            {{ $course->turno }}
                        </span>
                    </div>
                @endforeach
            </section>
        </div>
    </section>
    <div class="text-center pt-3 pb-5">
        <button class="btn btn-primary-custom btn-export-excel" type="button">Exportar a Excel</button>
    </div>
@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function(){
            $('.coursesSelect').on('click', function(){
                $('.coursesSelect').removeClass('selected');
                $(this).addClass('selected');
                $('.courseId').val($(this).attr('data-course'));
            });
            $('.btn-export-excel').on('click', function(){
                $('#formCourseExport').submit();
            });
        });
    </script>
@endpush