<li class="p-6 bg-white shadow-lg hover:shadow-xl transition rounded-2xl flex flex-col justify-between h-full relative space-y-4">
    <a href="{{ route('books.show', $book) }}" class="space-y-2">
        <!-- Truncate title after 2 lines -->
        <h3 class="font-bold text-2xl text-gray-900 line-clamp-2">{{ $book->title }}</h3>
        <div class="flex gap-1 text-gray-600">
            <p class="line-clamp-2">By</p>
            <p class="line-clamp-2 font-semibold">{{ $book->author }}</p>
        </div>     
    </a>

    <div class="flex grow"></div>
    <!-- Image Placeholder (Will be replaced with book cover) -->
    <div class="bg-gray-200 rounded-xl mt-auto h-48 flex items-center justify-center">
        @if($book->getMedia('cover')->isNotEmpty())
            <img src="{{ $book->getMedia('cover')->first()->getUrl() }}" 
                    alt="Book Cover" 
                    class="rounded-lg shadow-md object-cover w-full h-full">
        @else
            <img src="{{ Storage::url('defaults/Book_Cover_Mockup_Paperback-01-Thumbnail.webp') }}" 
                alt="Book Cover Preview" 
                class="rounded-lg shadow-md object-cover w-full h-full">
        @endif
    </div>

    @if (auth()->user() && auth()->user()->id != $user->id) 
        <a href="{{ $book->amazon_link }}" target="_blank" class="text-center bg-purple-600 text-white uppercase py-2 px-4 mt-4 rounded-full hover:bg-purple-700 transition w-full">
            Buy on Amazon
        </a>      
    @endif

    @if (auth()->user() && auth()->user()->id == $user->id)
        <form action="{{ route('library.destroy', $book) }}" method="post" class="mt-2">
            @method('DELETE')
            @csrf
            <button type="submit" class="text-center bg-purple-100 text-purple-500 uppercase py-2 px-4 rounded-full hover:bg-red-700 hover:text-white transition w-full">
                Delete Book from Library
            </button>
        </form>
    @endif
</li>