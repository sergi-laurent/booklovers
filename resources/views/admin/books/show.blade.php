<x-site-layout>
    <div class="max-w-6xl mx-auto grid grid-cols-2 gap-x-12 mt-20">
        
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

        <!-- Right Column (Book Details) -->
        <div class="col-span-1 flex flex-col justify-center">
            @if(Auth::user())
                <div class="text-right flex justify-end gap-2 mb-4">
                    <a href="{{route('admin.books.edit', $book)}}" 
                       class="bg-blue-100 text-blue-500 uppercase p-2 hover:font-semibold rounded-sm">Edit Book</a>
                    <form action="{{route('admin.books.destroy', $book)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="bg-red-100 text-red-500 uppercase p-2 hover:font-semibold rounded-sm">Delete Book</button>
                    </form>
                </div>
            @endif
            
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