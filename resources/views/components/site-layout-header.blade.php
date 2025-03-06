<div class="bg-blue-700 text-blue-50 mb-6">
        <div class="max-w-7xl m-auto flex justify-between items-center h-10">
            <div class="font-bold text-lg">BookLovers</div>
            <ul class="flex gap-x-4">
                @foreach($menu as $label => $url)
                    <li class="hover:font-semibold hover:text-white"><a href="{{$url}}">{{$label}}</a></li>
                @endforeach
            </ul>
            <div>Login Comes Here</div>
        </div>
</div>