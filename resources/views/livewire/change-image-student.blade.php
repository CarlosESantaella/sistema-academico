<div class="col-md-4 p-4 p-md-0">
    <label for="image">
        <img
            class="w-100 mb-3 cursor-pointer" 
            @if ($image)
                src="{{$image->temporaryUrl()}}"
            @else
                src="{{asset('images/user.png')}}"
            @endif
        >
    </label>
    <input type="file" name="image" id="image" class="d-none" wire:model="image">
</div>