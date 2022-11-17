<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="{{route('license-plates.store')}}">
        @csrf
        <div class="form-group">
            <label for="">gestion</label>
            <input type="text" name="gestion" class="form-control">
            @error('gestion')
                Erro en gestion
            @enderror
        </div>
        <hr>
        <div class="form-group">
            <label for="">codalumno</label>
            <input type="text" name="codalumno" class="form-control">
            @error('codalumno')
                Erro en codalumno
            @enderror
        </div>
        <hr>
        <div class="form-group">
            <label for="">codcurso</label>
            <input type="text" name="codcurso" class="form-control">
            @error('codcurso')
                Erro en codcurso
            @enderror
        </div>
        <hr>
        <div class="form-group">
            <label for="">codusuario</label>
            <input type="text" name="codusuario" class="form-control">
            @error('codusuario')
                Erro en codusuario
            @enderror
        </div>
        <hr>

        <input type="submit">
    </form>

</body>
</html>