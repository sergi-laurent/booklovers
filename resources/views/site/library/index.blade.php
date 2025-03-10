<x-site-layout>

    <p class="font-bold text-2xl">{{ auth()->user()->name }}'s' Library</p>

    <ul class="grid grid-cols-3 gap-8 mt-12">
        @foreach($books_owned as $book)
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

                <form action="to the book destroy" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="bg-red-100 text-red-500 uppercase p-2 hover:font-semibold rounded-sm w-full">Delete Book from library</button>
                </form>
            </li>
        @endforeach        
    </ul>


</x-site-layout>