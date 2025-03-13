<x-site-layout>


    <div class="px-4 mt-20">
        <div class="flex">
            <h3 class="text-gray-600 text-3xl font-bold">ADMIN Explore All Books</h3>
            <h3 class="text-gray-500 text-3xl font-semibold mx-2">- {{$books->count()}} Best Sellers</h3>
        </div>

        <div class="flex justify-end pl-6">
            <a href="{{route('admin.books.create')}}" class="text-center bg-purple-500 text-purple-50 uppercase p-2 hover:font-semibold rounded-4xl">Create Book</a> 
        </div>

        <!--Message for Feedback to user after adding a New User--> 
        <div class="my-4">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    

    <ul class="grid grid-cols-1 gap-8 mt-2">
        @foreach($books as $book)
            <li class="p-4 bg-gray-100 hover:bg-blue-50 flex h-full rounded-xl relative items-center">
                <form action="{{ route('admin.books.destroy', $book) }}" method="post" class="absolute top-2 right-2">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="bg-red-100 text-red-500 uppercase p-2 hover:font-semibold rounded-sm">
                        DELETE
                    </button>
                </form>
                
                
                <!-- Make entire card clickable -->
                <a href="{{ route('admin.books.show', $book) }}" class="w-full flex gap-x-6">
                    <!-- BOOK IMAGE (Left) -->
                    <div class="w-20 h-30 flex-shrink-0 flex items-center justify-center bg-gray-300 rounded-xl"> 
                            <p class="text-red-500 text-center">Book image HERE</p>
                    </div>

                    <!-- BOOK DETAILS (Right) -->
                    <div class="flex flex-col justify-center"> 
                        <h3 class="font-semibold text-xl">{{ $book->title }}</h3>
                        <p class="text-gray-600">By <span class="font-semibold">{{ $book->author }}</span></p>
                    </div>

                    <a href="{{ route('admin.books.edit', $book) }}" class="bg-purple-100 text-purple-500 uppercase p-2 hover:font-semibold rounded-sm">Edit</a>

                </a>
            </li>
        @endforeach
    </ul>

</x-site-layout>
