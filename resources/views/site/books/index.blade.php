<x-site-layout>

    

    <div class="px-4 mt-20">
        <div class="flex">
            <h3 class="text-gray-600 text-3xl font-bold">Explore All Books</h3>
            <h3 class="text-gray-500 text-3xl font-semibold mx-2">- {{$books_all_count}} Best Sellers</h3>
        </div>

        <div class="flex justify-end pl-6">
            <x-top-right-button :route="route('books.create')" text="Create Book" />
        </div> 
    </div>

    <!--Message for Feedback--> 
    <div class="my-4">
        <x-feedback-message type="success" />
        <x-feedback-message type="error" />
    </div>



    <ul class="grid grid-cols-3 gap-8 mt-4">
        @foreach($books as $book)
            <x-general-library :book="$book" :user="Auth::user()" />
        @endforeach
    </ul>

    <!-- Pagination Links -->
    <div class="mt-8">
        {{ $books->links('pagination::tailwind') }}
    </div>


</x-site-layout>
