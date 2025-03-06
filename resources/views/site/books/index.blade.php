<x-site-layout>
    <h1 class="font-bold text-2xl">This is the list of books</h1>

    <div class="text-right">
		<a href="{{route('books.create')}}" class="bg-blue-500 text-purple-50 uppercase p-2 hover:font-semibold rounded-sm">Create Book</a> 
	</div>

    <ul class="grid grid-cols-3 gap-12 mt-12">
        @foreach($books as $book)
            <li class="p-2 border-t border-t-black hover:bg-blue-50">
                <a href="{{route('books.show', $book)}}">
                    <h3 class="font-bold text-2xl">{{$book->title}}</h3>
                    <p class="line-clamp-2 mt-2">By {{$book->author}}</p>
                </a>
            </li>
        @endforeach
    </ul>
</x-site-layout>
