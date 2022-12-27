@extends('layouts.layout')
@section('title', 'Crear Alumno')
@push('styles')
    <style>

    </style>
@endpush
@section('content')
    <div class="container-fluid">
        @if(session('message'))
            <x-alert color="success" message="{{ session('message') }}" classes="mt-4 text-center" />
        @endif

        <form method="POST" id="form-create-student" action="{{ route('students.store') }}"  enctype="multipart/form-data">
            @csrf
            @method('POST')
            <x-admins.create-student />
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <div class="w-100">
                        <h5 class="modal-title text-white text-center" id="exampleModalLabel">¡Advertencia!</h5>
                        <p class="text-center m-0 tw-text-sm">Esta a punto de registrar a un nuevo alumno en el sistema</p>
                        <p class="text-center m-0 tw-text-sm">Por favor revise cuidadosamente los datos de registro y presione "Continuar" para confirmar el registro</p>
                    </div>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <form class="row" action="">
                            <div class="col-6">
                                <label for="">Código</label>
                                <input type="text" class="form-control tw-uppercase f-codigo2">
                            </div>
                            <div class="col-6">
                                <label for="">Nombres</label>
                                <input type="text" readonly class="form-control tw-uppercase f-nombres2">
                            </div>
                            <div class="col-6">
                                <label for="">RUDE</label>
                                <input type="text" class="form-control tw-uppercase f-rude2">
                            </div>
                            <div class="col-6">
                                <label for="">SIE</label>
                                <input type="text" class="form-control tw-uppercase f-sie2">
                            </div>
                            <div class="col-6">
                                <label for="">CI</label>
                                <input type="text" class="form-control tw-uppercase f-ci2">
                            </div>
                            <div class="col-6">
                                <label for="">Facturación</label>
                                <input type="text" class="form-control tw-uppercase f-facturacion2">
                            </div>
                            <div class="col-6">
                                <label for="">NIT</label>
                                <input type="text" class="form-control tw-uppercase f-nit2">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary-custom btn-continue">Continuar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/select-departamento-provincia.js')
    <script type="module">
        $(document).ready(function(){
            $('body').on('input', '.input-number', function(){
                this.value = this.value.replace(/[^0-9]/g,'');
            });
            $('.f-codigo').on('input', function(){
                let value = $(this).val();
                $('.f-codigo2').val(value);
            });
            $('.f-nombres').on('input', function(){
                let nombres = $(this).val();
                let appaterno = $('.f-appaterno').val();
                let apmaterno = $('.f-apmaterno').val();
                $('.f-nombres2').val(appaterno+' '+apmaterno+' '+nombres);
            });
            $('.f-appaterno').on('input', function(){
                let appaterno = $(this).val();
                let nombres = $('.f-nombres').val();
                let apmaterno = $('.f-apmaterno').val();
                $('.f-nombres2').val(appaterno+' '+apmaterno+' '+nombres);
            });
            $('.f-apmaterno').on('input', function(){
                let apmaterno = $(this).val();
                let appaterno = $('.f-appaterno').val();
                let nombres = $('.f-nombres').val();
                $('.f-nombres2').val(appaterno+' '+apmaterno+' '+nombres);
            });
            $('.f-rude').on('input', function(){
                let value = $(this).val();
                $('.f-rude2').val(value);
            });
            $('.f-sie').on('input', function(){
                let value = $(this).val();
                $('.f-sie2').val(value);
            });
            $('.f-ci').on('input', function(){
                let value = $(this).val();
                $('.f-ci2').val(value);
            });
            $('.f-facturacion').on('input', function(){
                let value = $(this).val();
                $('.f-facturacion2').val(value);
            });
            $('.f-nit').on('input', function(){
                let value = $(this).val();
                $('.f-nit2').val(value);
            });




            
            $('.f-codigo2').on('input', function(){
                let value = $(this).val();
                $('.f-codigo').val(value);
            });
            $('.f-nombres2').on('input', function(e){
                return false;
                // let fullName = $(this).val();
                // let fullNameA = fullNameA.split(' ');
            });
            $('.f-rude2').on('input', function(){
                let value = $(this).val();
                $('.f-rude').val(value);
            });
            $('.f-sie2').on('input', function(){
                let value = $(this).val();
                $('.f-sie').val(value);
            });
            $('.f-ci2').on('input', function(){
                let value = $(this).val();
                $('.f-ci').val(value);
            });
            $('.f-facturacion2').on('input', function(){
                let value = $(this).val();
                $('.f-facturacion').val(value);
            });
            $('.f-nit2').on('input', function(){
                let value = $(this).val();
                $('.f-nit').val(value);
            });



            $('body').on('click', '.btn-continue', function(){
                $('#form-create-student').submit();
            })

        });
    </script>
@endpush