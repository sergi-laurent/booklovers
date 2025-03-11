<x-site-layout>
    

    <p class="font-bold text-2xl">Your Wishlist</p>

    <ul class="grid grid-cols-1 gap-8 mt-12">
        @foreach($wishlist_books as $book)
            <li class="p-4 bg-gray-100 hover:bg-blue-50 flex h-full rounded-xl relative items-center">

                <form action="to the book destroy" method="post" class="absolute top-2 right-2">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="bg-red-100 text-red-500 uppercase p-2 hover:font-semibold rounded-sm">
                        DELETE
                    </button>
                </form>
                
                <!-- Make entire card clickable -->
                <a href="{{ route('books.show', $book) }}" class="w-full flex gap-x-6">
                    <!-- BOOK IMAGE (Left) -->
                    <div class="w-40 h-60 flex-shrink-0 flex items-center justify-center bg-gray-300 rounded-xl"> 
                            <p class="text-red-500 text-center">Book image HERE</p>
                    </div>

                    <!-- BOOK DETAILS (Right) -->
                    <div class="flex flex-col justify-center"> 
                        <h3 class="font-bold text-2xl">{{ $book->title }}</h3>
                        <div class="flex gap-1">
                            <p class="line-clamp-2">By</p>
                            <p class="line-clamp-2 font-semibold">{{ $book->author }}</p>
                        </div>      
                    </div>
                </a>
            </li>
        @endforeach        
    </ul>

    <div class="flex">
		<a href="{{ route('books.index') }}" class="w-full text-center bg-blue-700 text-purple-50 uppercase p-2 hover:font-semibold rounded-sm mt-4">Add a Book to your wishlist</a> 
	</div>

</x-site-layout>