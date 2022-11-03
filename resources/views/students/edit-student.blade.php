@extends('layouts.layout')
@section('title', 'Home')
@section('content')
<main>

    @if ($student->estado == '-1')
    {{-- <div class="modal fade" id="verifyModel" tabindex="-1" aria-labelledby="verifyModelLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p class="mb-4">
                    ¿Desea matricularse en el siguiente periodo escolar?
                </p>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-danger btn-no" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary btn-si">Si</button>
                </div>
            </div>
        </div>
        </div>
    </div> --}}

    @elseif ($student->estado != '1')
        <div class="container-fluid">
            <p>Esta sección esta bloqueada</p>
        </div>
    @else
        <div class="container-fluid">
            @if(session('message'))
                <x-alert color="success" message="Alumno actualizado correctamente!" classes="mt-4 text-center" />
            @endif

            <form method="POST" action="/students/{{$student->codigo}}"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-students.edit.edit-student :student="$student" :responsibles="$responsibles"/>
            </form>
        </div>
    @endif
</main>
@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function(){
            setTimeout(() => {
                $('.alert').slideUp();
            }, 3000);
            function changeStatus(id_estudiante, estado) {
                fetch(
                    "/students/"+id_estudiante+"/changeState",
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
                ).then(res => window.location.reload());
            }

            let id_estudiante = "{{$student->codigo}}";
            let estado = "{{$student->estado}}";
            
            if (estado == "-1") {
                Swal.fire({
                    title: '¿Desea matricularse en el siguiente periodo escolar?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si!',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        changeStatus(id_estudiante, "1")
                    }else{
                        changeStatus(id_estudiante, "0")

                    }
                })
            }
        });
    </script>
@endpush