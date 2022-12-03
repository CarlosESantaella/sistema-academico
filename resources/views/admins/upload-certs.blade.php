@extends('layouts.layout')
@section('title', 'Subir Certificados')
@section('content')
    <div class="tw-max-w-[700px] tw-w-[95%] card p-3 tw-mx-auto mt-4">
        @if(session('message'))
            <x-alert :message="session('message')" color="success" />
        @endif
        <form action="{{ route('uploads.certs') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control" name="files[]" accept=".pdf" multiple required>
            <div class="text-center mt-3">

                <button type="submit" class="btn btn-primary-custom">Enviar Certificados</button>
            </div>
        </form>
    </div>
@endsection