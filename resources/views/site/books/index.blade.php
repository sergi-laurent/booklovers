<h1 class="font-bold text-2xl">This is the list of books</h1>

<ul>
    @foreach($books as $book)
        <li>{{$book->title}}</li>
    @endforeach
</ul>