<li class="p-4 bg-gray-100 hover:bg-blue-50 flex flex-col justify-between h-full rounded-xl relative">
    <a href="{{route('books.show', $book)}}">
        <h3 class="font-bold text-xl">{{$book->title}}</h3>
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

    @if (auth()->user()->id != $user->id) 
        <a href="{{ $book->amazon_link }}" class="text-center bg-purple-500 text-purple-50 uppercase p-2 mt-2 hover:font-semibold rounded-4xl">Buy on Amazon</a>      
    @endif

    @if(auth()->user()->id == $user->id)
        <form action="{{ route('library.destroy', $book) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="text-center bg-purple-50 text-purple-500 uppercase p-2 mt-2 hover:font-semibold rounded-4xl w-full">
                Delete Book from library
            </button>
        </form>
    @endif
</li>