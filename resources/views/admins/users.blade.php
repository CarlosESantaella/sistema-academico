@extends('layouts.layout')
@push('styles')
    <style>
        .row > *{
            height: 300px;
        }
    </style>
@endpush
@section('content') 
    <div class="container-fluid">
        <div class="row">
            <section class="col-lg-2 border border-danger" >

            </section>
            <section class="col-lg-7  border border-danger">
                <div class="container-form-user card p-3">
                    <form action=""> 
                        
                    </form>
                </div>
            </section>
            <section class="col-lg-3  border border-danger">

            </section>
        </div>
    </div>
@endsection