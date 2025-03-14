<x-site-layout>


    <h1 class="font-bold text-2xl">{{$book->title}}</h1>
    <div class="flex gap-1">
        <p class="line-clamp-2 mt-2">By 
        <p class="line-clamp-2 mt-2 font-semibold">{{$book->author}}</p>
    </div>

    <p class="mt-4">{!! $book->getSummaryText()  !!}<p>   <!-- The !! allows us to use the RealText with paragraphs-->
</x-site-layout>