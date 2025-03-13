<x-site-layout>
    
    <div class="px-4 mt-20">
        <div class="flex items-center">
            <h3 class="text-gray-600 text-3xl font-bold">{{ $user->name }}'s Wishlist</h3>
            <h3 class="text-gray-500 text-3xl font-semibold mx-2">- {{$book_count}} Books</h3>
        </div>

        <div class="flex justify-end">
            <x-top-right-button :route="route('books.index')" text="+ Add Book" /> 
        </div>
    </div>

    <!-- Feedback Messages --> 
    <div class="my-4">
        <x-feedback-message type="success" />
        <x-feedback-message type="error" />
    </div>

    <ul class="grid grid-cols-1 gap-6 mt-4">
        @foreach($wishlist_books as $book)
            <li class="p-4 bg-white shadow-md hover:shadow-lg transition rounded-xl flex items-center gap-6 relative">
                
                @if(auth()->user()->id == $user->id)
                    <form action="{{ route('wishlist.destroy', $book) }}" method="post" class="absolute top-2 right-2">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="bg-red-100 text-red-500 uppercase px-3 py-1 rounded-md hover:bg-red-600 hover:text-white transition">
                            DELETE
                        </button>
                    </form>
                @endif
                
                <!-- Book Image (Left) -->
                <div class="w-40 h-60 flex-shrink-0 flex items-center justify-center bg-gray-300 rounded-lg"> 
                    <p class="text-gray-500 text-center">Book image HERE</p>
                </div>

                <!-- Book Details (Middle) -->
                <div class="flex flex-col justify-center flex-grow">
                    <a href="{{ route('books.show', $book) }}" class="block">
                        <h3 class="font-bold text-2xl text-gray-900">{{ $book->title }}</h3>
                        <p class="text-gray-600">By <span class="font-semibold">{{ $book->author }}</span></p>
                    </a>
                </div>

                <!-- Amazon Buy Button (Right) -->
                <a href="{{ $book->amazon_link }}" target="_blank" class="bg-purple-600 text-white uppercase px-4 py-2 rounded-lg hover:bg-purple-700 transition text-center">
                    Buy on Amazon
                </a>      

            </li>
        @endforeach        
    </ul>

    <!-- Add Book Button -->
    <div class="flex mt-4">
        <a href="{{ route('books.index') }}" class="w-full text-center bg-blue-700 text-white uppercase py-2 px-4 rounded-md hover:bg-blue-800 transition">
            Add a Book to your Wishlist
        </a> 
    </div>

</x-site-layout>