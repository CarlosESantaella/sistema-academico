<select class="form-select" id="{{$id}}" name="{{$id}}">
    <option value="">--</option>
    <option @if($nivel =='Inicial') selected @endif value="Inicial">Inicial</option>
    <option @if($nivel =='Primario') selected @endif value="Primario">Primario</option>
    <option @if($nivel =='Secundaria') selected @endif value="Secundaria">Secundaria</option>
</select>
