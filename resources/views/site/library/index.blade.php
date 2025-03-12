<x-site-layout>

    <div class="px-4 mt-20">
        <div class="flex">
            <h3 class="text-gray-600 text-3xl font-bold">{{ auth()->user()->name }}'s' Library</h3>
            <h3 class="text-gray-500 text-3xl font-semibold mx-2">- {{$books_count}} Books</h3>
        </div>

        <div class="flex justify-end pl-6">
            <a href="{{ route('books.index') }}" class="text-center bg-purple-500 text-purple-50 uppercase p-2 hover:font-semibold rounded-4xl">+ Add Book</a> 
        </div>
    </div>

    <ul class="grid grid-cols-3 gap-8 mt-4">
        @foreach($books_owned as $book)
            <li class="p-4 bg-gray-100 hover:bg-blue-50 flex flex-col justify-between h-full rounded-xl">
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

                <form action="to the book destroy" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="bg-red-100 text-red-500 uppercase p-2 mt-2 hover:font-semibold rounded-sm w-full">Delete Book from library</button>
                </form>
            </li>
        @endforeach        
    </ul>


</x-site-layout>