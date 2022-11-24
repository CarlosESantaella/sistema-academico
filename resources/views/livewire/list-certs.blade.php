
<div class="container-fluid p-4">
    <div class="card p-4 min-h-[86vh]">
        <h2 class="mb-4">Certificados</h2>

        <div>
            <select class="form-select tw-max-w-[250px] mb-3" wire:model="year" wire:change="filterByYear" name="" id="" 1>
                <option value="">Filtrar por año</option>
                @foreach ($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
        <div>
            @foreach ($newFiles as $file)
            @php
                $file = basename($file);
            @endphp
            <a target="_blank" href="{{asset('storage/students/certs/'.$file)}}" class="card p-3 mb-3">
                <div class="d-flex align-items-center">
                    <img src="{{asset('images/pdf.png')}}" width="30" class="me-3">
                    <span>
                        {{$file}}
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

