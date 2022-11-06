<select class="form-select" id="{{$id}}" name="{{$id}}">
    <option @if($exp =='LP') selected @endif value="LP La Paz">LP La Paz</option>
    <option @if($exp =='CB') selected @endif value="CB Cochabamba">CB Cochabamba</option>
    <option @if($exp =='OR') selected @endif value="OR Oruro">OR Oruro</option>
    <option @if($exp =='PT') selected @endif value="PT Potosí">PT Potosí</option>
    <option @if($exp =='TJ') selected @endif value="TJ Tarija">TJ Tarija</option>
    <option @if($exp =='SC') selected @endif value="SC Santa Cruz">SC Santa Cruz</option>
    <option @if($exp =='BE') selected @endif value="BE Beni">BE Beni</option>
    <option @if($exp =='PD') selected @endif value="PD Pando">PD Pando</option>
    <option @if($exp =='CH') selected @endif value="CH Chuquisaca">CH Chuquisaca</option>
</select>