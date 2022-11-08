<select class="form-select" id="{{$id}}" name="{{$id}}">
    <option value="">--</option>
    <option @if($ginstruccion =='PRIMARIA') selected @endif value="PRIMARIA">PRIMARIA</option>
    <option @if($ginstruccion =='SECUNDARIA') selected @endif value="SECUNDARIA">SECUNDARIA</option>
    <option @if($ginstruccion =='BACHILLER') selected @endif value="BACHILLER">BACHILLER</option>
    <option @if($ginstruccion =='UNIVERSITARIO') selected @endif value="UNIVERSITARIO">UNIVERSITARIO</option>
    <option @if($ginstruccion =='TECNICO MEDIO') selected @endif value="TECNICO MEDIO">TECNICO MEDIO</option>
    <option @if($ginstruccion =='TECNICO SUPERIOR') selected @endif value="TECNICO SUPERIOR">TECNICO SUPERIOR</option>
    <option @if($ginstruccion =='LICENCIATURA') selected @endif value="LICENCIATURA">LICENCIATURA</option>
    <option @if($ginstruccion =='POSTGRADO') selected @endif value="POSTGRADO">POSTGRADO</option>
    <option @if($ginstruccion =='CARRERA MILITAR') selected @endif value="CARRERA MILITAR">CARRERA MILITAR</option>
    <option @if($ginstruccion =='POLICIA') selected @endif value="POLICIA">POLICIA</option>
    <option @if($ginstruccion =='NORMALISTA') selected @endif value="NORMALISTA">NORMALISTA</option>
    <option @if($ginstruccion =='NO SABE/NO RESPONDE') selected @endif value="NO SABE/NO RESPONDE">NO SABE/NO RESPONDE</option>
    <option @if($ginstruccion =='NINGUNA') selected @endif value="NINGUNA">NINGUNA</option>
</select>
