<div class="mb-8">
    <label for="{{$name}}" class="font-semibold text-xl">{{$label}}</label>
    <textarea 
        name="{{$name}}" 
        rows="{{$rows}}" 
        placeholder="{{$placeholder}} "
        class="bg-gray-100 w-full rounded-sm mt-2 p-2  @error($name) border border-red-500 @enderror"
        >{{old($name) ?? $value}}</textarea>

    @error($name)
    <div class="text-sm p-2 text-red-500">
        {{$message}}
    </div>
    @enderror
</div>