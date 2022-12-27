@extends('layouts.layout')
@section('title', 'home')
@section('content')
    <section class="tw-w-100 tw-max-w-[1200px] tw-mx-auto tw-text-center tw-mt-60">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-xl-4 mt-4">
                    <a href="{{ route('teacher.search_students') }}" class="text-decoration-none">

                        <div class="card tw-shadow-2xl" >
                            <div class="card-body">
                            <h5 class="card-title">
                                Buscar alumno
                            </h5>
                            <figure>
                                <img src="" alt="">
                            </figure>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4 mt-4">
                    <a href="{{ route('teacher.create_student') }}" class="text-decoration-none">
                        <div class="card tw-shadow-2xl" >
                            <div class="card-body">
                                <h5 class="card-title">
                                    Registrar nuevo
                                </h5>
                                <figure>
                                    <img src="" alt="">
                                </figure>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4 mt-4">
                    <a href="{{ route('teacher.registration') }}" class="text-decoration-none">
                        <div class="card tw-shadow-2xl" >
                            <div class="card-body">
                                <h5 class="card-title">
                                    Matricula
                                </h5>
                                <figure>
                                    <img src="" alt="">
                                </figure>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
    </section>
@endsection
