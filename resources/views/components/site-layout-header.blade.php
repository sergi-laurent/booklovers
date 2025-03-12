<div class="bg-blue-700 text-blue-50 mb-6">
        <div class="max-w-7xl m-auto flex justify-between items-center h-10">
            <div>
                <a href="{{ route('home') }}" class="font-bold text-2xl">BookLovers</a>
            </div>
            <ul class="flex gap-x-4">
                @foreach($menu as $label => $url)
                    <li class="hover:font-semibold hover:text-white"><a href="{{$url}}">{{$label}}</a></li>
                @endforeach
            </ul>
            
            <div>
                @if(auth()->user() != null)
                    <div class="flex justify-center gap-4">
                        <a href="" class="bg-blue-50 text-blue-500 p-1 rounded-sm px-2 whitespace-nowrap"> {{ auth()->user()->name }} </a>
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" icon="arrow-right-start-on-rectangle" class="bg-blue-50 text-blue-500 p-1 rounded-sm px-2">
                                Log Out
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{route('login')}}" class="bg-blue-50 text-blue-500 p-1 rounded-sm px-2">Log in</a>
                @endif
            </div>
        </div>
</div>