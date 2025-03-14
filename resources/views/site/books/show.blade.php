<x-site-layout>
        <!-- Left Column (Book Cover) -->
        <div>
            <div class="bg-gray-100 h-[600px] p-6 rounded-2xl flex items-center justify-center shadow-md">
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
        </div>


    <h1 class="font-bold text-2xl">{{$book->title}}</h1>
    <div class="flex gap-1">
        <p class="line-clamp-2 mt-2">By 
        <p class="line-clamp-2 mt-2 font-semibold">{{$book->author}}</p>
    </div>

    <p class="mt-4">{!! $book->getSummaryText()  !!}<p>   <!-- The !! allows us to use the RealText with paragraphs-->
</x-site-layout>