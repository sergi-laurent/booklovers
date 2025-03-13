<x-site-layout>

    

    <div class="px-4 mt-20">
        <div class="flex">
            <h3 class="text-gray-600 text-3xl font-bold">Explore All Books</h3>
            <h3 class="text-gray-500 text-3xl font-semibold mx-2">- {{$books->count()}} Best Sellers</h3>
        </div>

        <div class="flex justify-end pl-6">
            <a href="{{route('books.create')}}" class="text-center bg-purple-500 text-purple-50 uppercase p-2 hover:font-semibold rounded-4xl">Create Book</a> 
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

</x-site-layout>
