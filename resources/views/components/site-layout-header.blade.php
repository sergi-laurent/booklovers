<div class="bg-blue-700 text-blue-50 py-4 shadow-md">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6">
        
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-wide hover:text-white transition">
            BookLovers
        </a>

        <!-- Navigation Menu -->
        <ul class="hidden md:flex gap-x-6 text-lg font-medium">
            @foreach($menu as $label => $url)
                <li>
                    <a href="{{ $url }}" class="hover:text-white transition duration-300">
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Authentication -->
        <div>
            @if(auth()->check())
                <div class="flex items-center gap-4">
                    <!-- User Profile -->
                    <a href="{{ route('admin.groups.index') }}" class="bg-blue-50 text-blue-700 font-semibold px-4 py-2 rounded-md shadow hover:bg-white transition">
                        {{ auth()->user()->name }}
                    </a>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-blue-50 text-blue-700 font-semibold px-4 py-2 rounded-md shadow hover:bg-white transition">
                            Log Out
                        </button>
                    </form>
                </div>
            @else
                <!-- Login Button -->
                <a href="{{ route('login') }}" class="bg-blue-50 text-blue-700 font-semibold px-4 py-2 rounded-md shadow hover:bg-white transition">
                    Log in
                </a>
            @endif
        </div>

    </div>
</div>