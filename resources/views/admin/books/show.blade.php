<x-site-layout>

    @if(Auth::user())
        <div class="text-right flex justify-end gap-2">
            <a href="{{route('admin.books.edit', $book)}}" class="bg-blue-100 text-blue-500 uppercase p-2 hover:font-semibold rounded-sm">Edit Book</a>
            <form action="{{route('admin.books.destroy', $book)}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="bg-red-100 text-red-500 uppercase p-2 hover:font-semibold rounded-sm">Delete Book</button>
            </form>
        <!-- Left Column (Book Cover) -->
        <div>
            <div class="bg-gray-100 h-[600px] p-6 rounded-2xl flex items-center justify-center shadow-md">
                @if($book->getMedia('cover')->isNotEmpty())
                    <img src="{{ $book->getMedia('cover')->first()->getUrl('') }}" 
                    alt="Book Cover" class="rounded-lg shadow-md object-cover w-full h-full">
                @else
                    <p class="text-gray-500">No cover image available</p>
                @endif
            </div>
        </div>
    @endif

    <h1 class="font-bold text-2xl">{{$book->title}}</h1>
    <div class="flex gap-1">
        <p class="line-clamp-2 mt-2">By 
        <p class="line-clamp-2 mt-2 font-semibold">{{$book->author}}</p>
    </div>

    <p class="mt-4">{!! $book->getSummaryText()  !!}<p>   <!-- The !! allows us to use the RealText with paragraphs-->
</x-site-layout>