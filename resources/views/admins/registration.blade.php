@extends('layouts.layout')
@section('titulo', 'Matricula')
@push('styles')
    <style>
        .app-main{
            display: flex;
            justify-content: center;
        }
        .container-register{
            
            border: 1px solid red;

        }
        .container-register > .register{
            width: 95%;
            max-width: 700px;
            margin: 0 auto;
            margin-top: 3rem;

        }
        .sidebar-register{
            max-width: 300px;
            border: 1px solid red;
        }
    </style>
@endpush
@section('content')
    <section class="w-100 container-register tw-pb-20">
        <div class="register border bg-white tw-shadow-2xl p-2">
            <fieldset class="card pb-3">
                <legend class="tw-text-sm float-none w-auto">Información del estudiante</legend>
                <div class="container">
                    <div class="row mb-1">
                        <div class="col-12 col-md-2">
                            <label for="">
                                Código:
                            </label>
                        </div>
                        <div class="col-12 col-md-8  mb-2">
                            <input class="form-control" type="text">
                        </div>
                        <div class="col-12 col-lg-2 ">
                            <input class="btn btn-primary-custom" type="button" value="Buscar">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <label for="">
                                Nombre:
                            </label>
                        </div>
                        <div class="col-12 col-md-10">
                            <input class="form-control" readonly type="text">
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset class="card pb-3 mt-3">
                <legend class="tw-text-sm float-none w-auto">Gestión academica</legend>
                <div style="width: 95%; max-width: 150px; margin: 0 auto;">
                    <input type="number" class="form-control" value="2020">
                </div>

            </fieldset>
            <fieldset class="card pb-3 mt-3">
                <legend class="tw-text-sm float-none w-auto">Datos de inscripción</legend>
                <div class="mx-auto  w-100 text-center" style="max-width: 500px;">
                    <select class="form-select" name="" id="">
                        <option value="">matricula</option>
                    </select>
                    <button class="btn btn-primary-custom btn-sm tw-text-sm mt-2">Registrar Matricula</button>
                </div>
            </fieldset>
            <fieldset class="card p-2 pb-3 mt-3">
                <legend class="tw-text-sm float-none w-auto">Historial</legend>
                <div class="table-responsive" style="max-height: 200px; overflow: scroll;">
                    <table class="table table-bordered">
                        <thead>
                            <th>Código</th>
                            <th>Fecha Inscripción</th>
                            <th>Curso</th>
                            <th>Gestión</th>
                            <th>Usuario</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>prueba1</td>
                                <td>prueba2</td>
                                <td>prueba3</td>
                                <td>prueba4</td>
                                <td>prueba5</td>
                            </tr>
                            <tr>
                                <td>prueba1</td>
                                <td>prueba2</td>
                                <td>prueba3</td>
                                <td>prueba4</td>
                                <td>prueba5</td>
                            </tr>
                            <tr>
                                <td>prueba1</td>
                                <td>prueba2</td>
                                <td>prueba3</td>
                                <td>prueba4</td>
                                <td>prueba5</td>
                            </tr>
                            <tr>
                                <td>prueba1</td>
                                <td>prueba2</td>
                                <td>prueba3</td>
                                <td>prueba4</td>
                                <td>prueba5</td>
                            </tr>
                            <tr>
                                <td>prueba1</td>
                                <td>prueba2</td>
                                <td>prueba3</td>
                                <td>prueba4</td>
                                <td>prueba5</td>
                            </tr>
                            <tr>
                                <td>prueba1</td>
                                <td>prueba2</td>
                                <td>prueba3</td>
                                <td>prueba4</td>
                                <td>prueba5</td>
                            </tr>
                            <tr>
                                <td>prueba1</td>
                                <td>prueba2</td>
                                <td>prueba3</td>
                                <td>prueba4</td>
                                <td>prueba5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <div class="mt-2">
                <button class="btn btn-primary-custom">Eliminar</button>
            </div>
        </div>
    </section>

    <section class="w-100 sidebar-register">

    </section>
@endsection
@push('scripts')
    
@endpush