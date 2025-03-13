<x-site-layout>

    <div class="bg-gray-100 h-20 w-50 p-4 mb-8 rounded-2xl flex justify-center items-center mx-auto">
        <h2 class="font-bold">SECRET BOOKS</h2>
    </div>

    <div class="px-4 mt-20">
        <div class="flex">
            <h3 class="text-gray-600 text-3xl font-bold">{{$user->name}}'s Library</h3>
            <h3 class="text-gray-500 text-3xl font-semibold mx-2">- {{$books_count}} Books</h3>
        </div>

        <div class="flex justify-end pl-6">
            <a href="{{ route('books.index') }}" class="text-center bg-purple-500 text-purple-50 uppercase p-2 hover:font-semibold rounded-4xl">+ Add Book</a> 
        </div>

        <!--Message for Feedback to user after adding a New User--> 
        <div class="my-4">
            <x-feedback-message type="success" />
            <x-feedback-message type="error" />
        </div>
        
    </div>

    <ul class="grid grid-cols-3 gap-8 mt-4">
        @foreach($books_owned as $book)

            <x-book-library-card :book="$book" :user="$user"/>
        @endforeach        
    </ul>


</x-site-layout>