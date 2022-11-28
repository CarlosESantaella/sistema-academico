<div>
    <div class="container-img-user">
    
        <label for="image" class="inline-block mb-3 rounded-full">
            <img
                class="  tw-cursor-pointer tw-object-cover tw-object-center tw-rounded-full tw-block tw-aspect-square tw-w-100 tw-max-w-[250px]" style="width: 100%; max-width: 200px;"
                @if ($image)
                    src="{{$image->temporaryUrl()}}"
                @elseif($user->foto ?? false)
                    src="{{asset('storage/users/img/'.$user->foto)}}"
                @else
                    src="{{asset('images/user.png')}}"
                @endif 
            >
        </label>
    </div>
    <input type="file" name="image" id="image" class="tw-hidden" wire:model="image">
</div>
