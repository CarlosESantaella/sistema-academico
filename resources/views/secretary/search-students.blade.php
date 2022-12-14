@extends('layouts.layout')
@section('title', 'Buscar Alumnos')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
    <style>
        #students > tbody > tr{
            cursor: pointer;
        }
        #students > tbody > tr.active{
            background: var(--color-primary);
            color: white;
        }
        #students > tbody > tr.active > td{
            color: white !important;
        }
    </style>
@endpush
@section('content')
<div class="container-table mx-auto mt-5" style="max-width: 1200px; width: 95%;">

    <div class="table-responsive">
        <form action="" method="POST" class="filters-table d-flex justify-content-between flex-wrap">
            @csrf
            <div class="d-flex flex-wrap align-items-center justify-content-between w-100 mb-4">
                {{-- <div class="d-flex flex-wrap align-items-center">

                    <span class="d-block me-3">Buscar por:</span>
                    <div class=" d-flex align-items-center me-2">
                        <label for="codigo">Código</label>
                        <input 
                            class="m-0 ms-1 mt-1" 
                            name="search_by" 
                            type="radio" 
                            id="codigo" 
                            value="codigo"
                            @if ($search_by == 'codigo')
                                checked
                            @endif
                        >
                    </div>
                    <div class=" d-flex align-items-center me-3">
                        <label for="ci">CI</label>
                        <input 
                            class="m-0 ms-1 mt-1" 
                            name="search_by" 
                            type="radio" 
                            id="ci" 
                            value="ci"
                            @if ($search_by == 'ci')
                                checked
                            @endif
                        >
                    </div>
                    <div class=" d-flex align-items-center me-3">
                        <label for="pasaporte">Pasaporte</label>
                        <input 
                            class="m-0 ms-1 mt-1" 
                            name="search_by" 
                            type="radio" 
                            id="pasaporte" 
                            value="pasaporte"
                            @if ($search_by == 'pasaporte')
                                checked
                            @endif
                        >
                    </div>
                    <div class=" d-flex align-items-center me-3">
                        <label for="appaterno">Ap. Paterno</label>
                        <input 
                            class="m-0 ms-1 mt-1" 
                            name="search_by" 
                            type="radio" 
                            id="appaterno" 
                            value="appaterno"
                            @if ($search_by == 'appaterno')
                                checked
                            @endif
                        >
                    </div>
                    <div class=" d-flex align-items-center me-3">
                        <label for="apmaterno">Ap. Materno</label>
                        <input 
                            class="m-0 ms-1 mt-1" 
                            name="search_by" 
                            type="radio" 
                            id="apmaterno" 
                            value="apmaterno"
                            @if ($search_by == 'apmaterno')
                                checked
                            @endif
                        >
                    </div>
                    <div class=" d-flex align-items-center me-3">
                        <input 
                            class="form-control m-0 ms-1 mt-1" 
                            name="search_value" 
                            type="text" 
                            id="search-box"
                            @if ($search_value)
                            value="{{$search_value}}"
                            @endif
                        >
                    </div>
                </div>
                <div class=" d-flex align-items-center ">

                    <div class="d-flex align-items-center me-3">
                        <label for="gestion">Gestión: </label>
                        <input 
                            class="form-control m-0 ms-1 mt-1" 
                            style="width: 90px" 
                            name="gestion" 
                            type="number" 
                            id="gestion"
                            @if($gestion)
                            value="{{$gestion}}"
                            @endif
                        >
                    </div>
                    <div>
                        <input class="btn btn-primary-custom" style="width: 90px" name="" value="Buscar" type="submit" id="search-button">
                    </div> --}}
                </div>
            </div>
        </form>
        <table id="students" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Cod. Estudiante</th>
                    <th>Estudiante</th>
                    {{-- <th>Nivel</th>
                    <th>Turno</th> --}}
                    <th>Sexo</th>
                    <th>Matriculación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr data-id="{{ $student->codigo }}" data-state="{{ $student->estado }}">
                        <td>{{ $student->codigo }}</td>
                        <td>{{ $student->nombres }} {{ $student->appaterno }} {{ $student->apmaterno }}</td>
                        {{-- <td>{{ $curso_procesado ?? '' }}</td> --}}
                        {{-- <td>{{ $student->course->nivel ?? '' }}</td>
                        <td>{{ $student->course->turno ?? '' }}</td> --}}
                        <td>{{ ($student->sexo == "M") ? 'Masculino' : 'Femenino' }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex flex-wrap justify-content-between mt-2">
            <div class="d-flex flex-wrap">
                <a class="link-edit-student" href="#" target="_blank">
                    <button class="btn btn-primary-custom me-1">
                        <i class="fa-solid fa-pen"></i>
                        Editar Registro
                    </button>
                </a>
                <a class="link-matricula-student" href="#" target="_blank">
                    <button class="btn btn-primary-custom me-1">
                        <i class="fa-solid fa-file-pen"></i>
                        Matricular
                    </button>
                </a>
                <a href="{{ route('admins.create_student') }}" target="_blank">
                    <button class="btn btn-primary-custom me-1">
                        <i class="fa-solid fa-user"></i>
                        Registro Nuevo
                    </button>
                </a>
                <a class="link-disabled-student" data-id="" href="#" >
                    <button class="btn btn-primary-custom me-1">
                        <i class="fa-solid fa-power-off"></i>
                        Deshabilitar
                    </button>
                </a>
            </div>
            <div>
                {{-- <a class="link-delete-student" href="#" data-id="">
                    <button class="btn btn-primary-custom">Eliminar Registro</button>
                </a> --}}
            </div>
        </div>
        
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
    <script type="module">
        $(document).ready(function () {
            $('#students').DataTable({
                lengthChange: false,
                scrollY: '400px',
                scrollCollapse: true,
                paging: false,
            });
            $('body').on('click', '#students > tbody > tr', function(){
                let id = $(this).attr('data-id');
                let state = $(this).attr('data-state');

                $('#students > tbody > tr').removeClass('active');
                $(this).addClass('active');

                $('.link-edit-student').attr('href', '/dashboard-s/students/'+id+'CLS/edit');

                $('.link-disabled-student').attr('data-id', id);
                if(state == '0'){
                    $('.link-disabled-student button').text('Habilitar');
                    $('.link-disabled-student button').attr('data-state', -1);
                }else{
                    $('.link-disabled-student button').text('Deshabilitar');
                    $('.link-disabled-student button').attr('data-state', 0);

                }
                $('.link-delete-student').attr('data-id', id);
                
            });

            function changeStatus2(id_estudiante, estado) {
                fetch(
                    "/students/"+id_estudiante+"/changeState2",
                    {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            'estado': estado
                        }) 
                    }
                )
                .then(res => res.text())
                .then(data => {
                    if(estado == '0'){

                        Swal.fire({
                            title: 'Usuario Deshabilitado',
                            imageUrl: "/images/logo-salle-2.png",
                            confirmButtonColor: '#101f34',
                            confirmButtonText: 'Ok',
                        });
                    }else{
                        Swal.fire({
                            title: 'Usuario Habilitado',
                            imageUrl: "/images/logo-salle-2.png",
                            confirmButtonColor: '#101f34',
                            confirmButtonText: 'Ok',
                        });
                    }
                });
            }

            $('.link-disabled-student').on('click', function(){
                let id_student = $(this).attr('data-id');
                let estado = $(this).children('button').attr('data-state');
                
                

                if(id_student.trim() != ''){
                    changeStatus2(id_student, estado);
                    $('tr[data-id='+id_student+']').attr('data-state', estado);
                    if(estado == '0'){
                        $(this).children('button').attr('data-state', -1);
                        $(this).children('button').text('Habilitar');
                    }else{
                        $(this).children('button').attr('data-state', 0);
                        $(this).children('button').text('Deshabilitar');
                    }
                }
            })



        });
    </script>
@endpush