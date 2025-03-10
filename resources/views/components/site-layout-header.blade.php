<div class="bg-blue-700 text-blue-50 mb-6">
        <div class="max-w-7xl m-auto flex justify-between items-center h-10">
            <div class="font-bold text-lg">BookLovers</div>
            <ul class="flex gap-x-4">
                @foreach($menu as $label => $url)
                    <li class="hover:font-semibold hover:text-white"><a href="{{$url}}">{{$label}}</a></li>
                @endforeach
            </ul>
            
            <div class="bg-blue-50 text-blue-500 p-1 rounded-sm px-2">
                @if(auth()->user() != null)
                    <a href="">{{ auth()->user()->name }} </a>
                @else
                    <a href="{{route('login')}}">Log in</a>
                @endif
            </div>
        </div>
</div>