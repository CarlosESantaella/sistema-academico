@extends('layouts.layout')
@section('title', 'Home')
@section('content')
<script>
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
</script>
<main>
    @if ($student->estado != '1')
        <div class="container-fluid">
            <p>Esta sección esta bloqueada</p>
        </div>
    @else
        <div class="container-fluid">
            <form method="POST" action="/students/{{$student->codigo}}">
                <x-students.edit.edit-student :student="$student" :responsibles="$responsibles"/>
            </form>
        </div>
    @endif
</main>
@endsection