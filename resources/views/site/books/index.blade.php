<x-site-layout>
    <h1 class="font-bold text-2xl">This is the list of books</h1>

    <ul class="grid grid-cols-3 gap-12 mt-12">
        @foreach($books as $book)
            <li class="p-2 border-t border-t-black hover:bg-purple-50">
                <a href="/books/{{$book->id}}">
                    <h3 class="font-bold text-2xl">{{$book->title}}</h3>
                    <p class="line-clamp-2">By {{$book->author}}</p>
                </a>
            </li>
        @endforeach
    </ul>
</x-site-layout>
