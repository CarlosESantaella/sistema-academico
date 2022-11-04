<select class="form-select" id="{{$id}}" name="{{$id}}">
    <option @if($exp =='LP La Paz') selected @endif value="LP La Paz">LP La Paz</option>
    <option @if($exp =='CB Cochabamba') selected @endif value="CB Cochabamba">CB Cochabamba</option>
    <option @if($exp =='OR Oruro') selected @endif value="OR Oruro">OR Oruro</option>
    <option @if($exp =='PT Potosí') selected @endif value="PT Potosí">PT Potosí</option>
    <option @if($exp =='TJ Tarija') selected @endif value="TJ Tarija">TJ Tarija</option>
    <option @if($exp =='SC Santa Cruz') selected @endif value="SC Santa Cruz">SC Santa Cruz</option>
    <option @if($exp =='BE Beni') selected @endif value="BE Beni">BE Beni</option>
    <option @if($exp =='PD Pando') selected @endif value="PD Pando">PD Pando</option>
    <option @if($exp =='CH Chuquisaca') selected @endif value="CH Chuquisaca">CH Chuquisaca</option>
</select>