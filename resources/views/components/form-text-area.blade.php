<div class="mb-8">
    <label for="{{$name}}" class="block font-medium">{{$label}}</label>
    <textarea 
        name="{{$name}}" 
        rows="{{$rows}}" 
        placeholder="{{$placeholder}} "
        class="editor bg-gray-100 w-full rounded-sm mt-2 p-2  @error($name) border border-red-500 @enderror"
        >{{old($name) ?? $value}}</textarea>

    @error($name)
    <div class="text-sm p-2 text-red-500">
        {{$message}}
    </div>
    @enderror
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js" integrity="sha512-RnlQJaTEHoOCt5dUTV0Oi0vOBMI9PjCU7m+VHoJ4xmhuUNcwnB5Iox1es+skLril1C3gHTLbeRepHs1RpSCLoQ==" crossorigin="anonymous"></script>

@if($rte)
    <script>
        var editor_config = {
            relative_urls : false,
            path_absolute: "{{config('app.url')}}",
            selector: '.editor',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks fullscreen',
                'contextmenu paste help wordcount code'
            ],
            toolbar: ' undo redo |  bold italic | link | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | removeformat | code | help',
        }
        tinymce.init(editor_config);
    </script>
@endif