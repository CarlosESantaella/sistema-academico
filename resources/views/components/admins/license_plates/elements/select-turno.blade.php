<select class="form-select" id="{{$id}}" name="{{$id}}">
    <option value="">--</option>
    <option @if($turno =='Mañana') selected @endif value="Mañana">Mañana</option>
    <option @if($turno =='Tarde') selected @endif value="Tarde">Tarde</option>
    <option @if($turno =='Noche') selected @endif value="Noche">Noche</option>
</select>
