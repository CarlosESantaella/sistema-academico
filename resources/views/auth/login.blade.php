@extends('layouts.layout')
@section('title', 'Login')
@section('content')
<main class="tw-h-screen d-flex justify-content-center align-items-center" style="height: calc(100vh - 80px)">

        <div class="card p-0 tw-max-w-md w-100">
            <div class="px-5">
                <img src="{{asset('images/logo-salle-2.png')}}" alt="Logo salle" class="w-100">
            </div>
            <div class="p-5">
                @if(session('message'))
                    <x-alert color="danger" message="{{ session('message') }}" />
                @endif
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    {{-- <div class="form-group mb-3">
                        <label for="type" class="mb-1">Tipo de usuario:</label>
                        <select name="user_type" id="type" class="form-control">
                            <option value="0">Administrador</option>
                            <option value="1">Profesor</option>
                            <option value="2">Secretaria</option>
                            <option value="3">Estudiante</option>
                        </select>
                    </div> --}}
                    <div class="form-group mb-3">
                        <label for="username" class="mb-1">Username:</label>
                        <input type="text" name="nombres" id="username" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="mb-1">Password:</label>
                        <input type="text" name="clave" id="password" class="form-control">
                    </div>
                    <input type="submit" value="Entrar" class="btn w-100 btn-primary-custom mt-3">
                </form>
            </div>
        </div>
</main>
@endsection
@push('scripts')
    <script type="module">
        
    </script>
@endpush