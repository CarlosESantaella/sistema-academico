@extends('layouts.layout')
@section('title', 'Home')
@section('content')
<script>

</script>
<main>
    @if ($student->estado != '1')
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
    <script>
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
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            'estado': estado
                        }) 
                    }
                )
            }
            let id_estudiante = "{{$student->codigo}}";
            let estado = "{{$student->estado}}";
            if (estado == "-1") {
                if (confirm("¿Desea matricularse en el siguiente periodo escolar?")) {
                    changeStatus(id_estudiante, "1");
                }else {
                    changeStatus(id_estudiante, "-1");
                }
            }
        });
    </script>
@endpush