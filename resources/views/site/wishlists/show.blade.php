<x-site-layout>
    <h1 class="font-bold text-4xl text-red-500 mb-6">This is a hardcoded wishlist for the wishlid with id = {{$wishlist->id}}</h1>

    <p class="font-bold text-2xl">Your Wishlist</p>

    <ul class="grid grid-cols-1 gap-3 mt-6">
        @for ($i = 1; $i <= 10; $i++)
            <li class=" hover:bg-blue-50">
                <a href="to the book show">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-xl">Book Title - {{$i}}</h3>
                        <div class="text-right flex justify-end gap-2">
                            <form action="to the book destroy" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="bg-red-100 text-red-500 uppercase p-2 hover:font-semibold rounded-sm">Delete Book</button>
                            </form>
                        </div>
                    </div>    
                </a>
            </li>
        @endfor
    </ul>

    <div class="flex">
		<a href="" class="w-full text-center bg-blue-700 text-purple-50 uppercase p-2 hover:font-semibold rounded-sm mt-4">Add a Book to your wishlist</a> 
	</div>

</x-site-layout>