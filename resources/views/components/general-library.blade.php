<li class="p-4 bg-gray-100 hover:bg-blue-50 flex flex-col justify-between h-full rounded-xl">
    <a href="{{route('books.show', $book)}}">
        <h3 class="font-bold text-2xl">{{$book->title}}</h3>
        <div class="flex gap-1">
            <p class="line-clamp-2">By</p>
            <p class="line-clamp-2 font-semibold">{{$book->author}}</p>
        </div>     
    </a>

    <!-- Push the image div to the bottom -->
    <div class="flex-grow"></div>

    <div class="p-4 bg-gray-300 rounded-xl mt-6">
        <p class="text-red-500 h-50">Book image HERE</p>
    </div>

    @if(auth()->user())
        @if(auth()->user()->books->contains($book->id))
            <div class="bg-gray-300 text-white uppercase p-2 mt-2 text-center rounded hover:font-semibold w-full">
                <p>You already have this book</p>
            </div>
            
        @else
            <form action="{{ route('library.store', $book->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-500 text-white uppercase p-2 mt-2 text-center rounded hover:bg-blue-600 hover:font-semibold w-full">
                    Add to Library
                </button>
            </form>
        @endif

        @if(auth()->user()->wishlist->books->contains($book->id))
            <div class="bg-gray-300 text-white uppercase p-2 mt-2 text-center rounded hover:font-semibold w-full">
                <p>This book is on your wishlist</p>
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
            <button type="submit" class="bg-blue-500 text-white uppercase p-2 mt-2 text-center rounded hover:bg-blue-600 hover:font-semibold w-full">
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