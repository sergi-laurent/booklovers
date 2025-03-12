<div class="max-w-lg mx-auto bg-white shadow-md rounded-xl p-6">
    <form action="{{$action}}" method="post">

        @csrf

        @if ($method == 'put')
            @method("put")
        @endif

        <div class="text-xl font-bold mb-4">{{$title}}</div>

        {{$slot}}

        <div class="flex justify-end gap-4">
            <a href="{{$cancelurl}}" class="bg-blue-100 text-blue-500 uppercase p-2 hover:font-semibold rounded-sm">Cancel</a>
            <button type="submit" class="bg-blue-500 text-blue-50 uppercase p-2 hover:font-semibold rounded-sm">{{$submittext}}</button>
        </div>

    </form>
</div>