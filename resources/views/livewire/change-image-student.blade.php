<div class="col-xl-4 p-4 p-md-2 text-center">
    <div class="container-img-student">

        <label for="image" class="inline-block mb-3 rounded-full">
            <img
                class="  cursor-pointer object-cover object-center rounded-full block aspect-square w-100 max-w-[250px]" style="width: 100%; max-width: 250px;"
                @if ($image)
                    src="{{$image->temporaryUrl()}}"
                @elseif($student->foto)
                    src="{{asset('storage/students/img/'.$student->foto)}}"
                @else
                    src="{{asset('images/user.png')}}"
                @endif
            >
        </label>
    </div>
    <input type="file" name="image" id="image" class="hidden" wire:model="image">
</div>