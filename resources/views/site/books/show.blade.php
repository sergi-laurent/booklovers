<x-site-layout>
    <div class="max-w-6xl mx-auto grid grid-cols-2 gap-x-12 mt-20">
        
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

        <!-- Right Column (Book Details) -->
        <div class="col-span-1 flex flex-col justify-center">
            <h1 class="font-bold text-5xl text-blue-500 leading-tight">{{ $book->title }}</h1>
            
            <div class="flex gap-2 mt-2">
                <p class="text-2xl text-gray-600">By</p>
                <p class="text-2xl font-semibold text-gray-700">{{ $book->author }}</p>
            </div>

            <p class="text-lg text-gray-700 mt-6 leading-relaxed">
                {!! $book->getSummaryText() !!}
            </p>

            <!-- CTA: Buy the Book -->
            <div class="mt-10">
                <a href="{{ $book->amazon_link }}" 
                   class="bg-blue-500 text-white text-xl font-semibold uppercase rounded-xl py-3 px-6 block text-center shadow-lg hover:bg-blue-600 transition">
                   📖 Buy on Amazon
                </a>
            </div>
        </div>

    </div>
</x-site-layout>