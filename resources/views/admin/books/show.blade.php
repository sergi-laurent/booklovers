<x-site-layout>

    @if(Auth::user())
        <div class="text-right flex justify-end gap-2">
            <a href="{{route('admin.books.edit', $book)}}" class="bg-blue-100 text-blue-500 uppercase p-2 hover:font-semibold rounded-sm">Edit Book</a>
            <form action="{{route('admin.books.destroy', $book)}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="bg-red-100 text-red-500 uppercase p-2 hover:font-semibold rounded-sm">Delete Book</button>
            </form>
        </div>
    @endif

    <h1 class="font-bold text-2xl">{{$book->title}}</h1>
    <div class="flex gap-1">
        <p class="line-clamp-2 mt-2">By 
        <p class="line-clamp-2 mt-2 font-semibold">{{$book->author}}</p>
    </div>

    <p class="mt-4">{!! $book->getSummaryText()  !!}<p>   <!-- The !! allows us to use the RealText with paragraphs-->
</x-site-layout>