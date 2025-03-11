<x-site-layout>

    <!--Sending Messages -->
    @if (session()->has('message'))
        <div class="bg-red-50 text-red-500 p-3 rounded-md mb-4">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="bg-green-50 text-green-500 p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif


    <h1 class="font-bold text-3xl text-gray-600 mt-12">Explore All Books</h1>

    <div class="text-right">
		<a href="{{route('books.create')}}" class="bg-blue-500 text-blue-50 uppercase p-2 hover:font-semibold rounded-sm">Create Book</a> 
	</div>

    <ul class="grid grid-cols-3 gap-8 mt-12">
        @foreach($books as $book)
            <li class="p-4 bg-gray-100 hover:bg-blue-50 flex flex-col justify-between h-full rounded-xl">
                <a href="{{route('books.show', $book)}}">
                    <h3 class="font-bold text-2xl">{{$book->title}}</h3>
                    <div class="flex gap-1">
                        <p class="line-clamp-2">By</p>
                        <p class="line-clamp-2 font-semibold">{{$book->author}}</p>
                    </div>     
                </a>

                <div class="p-4 bg-gray-300 rounded-xl mt-6 mb-8">
                    <p class="text-red-500">Book image HERE</p>
                </div>

                @if(auth()->user()->books->contains($book->id))
                    <div class="bg-gray-300 text-white uppercase p-2 mt-4 text-center rounded hover:font-semibold w-full">
                        <p>You already have this book</p>
                    </div>
                    
                @if(auth()->user())

                    @if(auth()->user()->wishlist->books->contains($book->id))
                        <div class="bg-gray-300 text-white uppercase p-2 mt-4 text-center rounded hover:font-semibold w-full">
                            <p>You already have this book on your wishlist</p>
                        </div>
                        
                    @else
                        <form action="{{ route('wishlist.store', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-700 text-white uppercase p-2 mt-2 text-center rounded hover:bg-blue-600 hover:font-semibold w-full">
                                Add to Wishlist
                            </button>
                        </form>
                    @endif
                @else
                    <form action="{{ route('library.store', $book->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white uppercase p-2 mt-4 text-center rounded hover:bg-blue-600 hover:font-semibold w-full">
                            Add to Library
                        </button>
                    </form>
                    <form action="{{ route('wishlist.store', $book->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-700 text-white uppercase p-2 mt-2 text-center rounded hover:bg-blue-600 hover:font-semibold w-full">
                            Add to Wishlist
                        </button>
                    </form>
                @endif

            </li>
        @endforeach
    </ul>

</x-site-layout>
