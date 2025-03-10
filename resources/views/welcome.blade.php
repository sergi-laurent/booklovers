<x-site-layout>
    <div class="max-w-6xl mx-auto grid grid-cols-2 gap-x-12 mt-20">
        <div class="col-span-1">
            <h1 class="font-bold text-4xl text-blue-400">Secret Books</h1>
            <h2 class="font-bold text-2xl text-gray-400">The Secret Santa for Book Lovers</h1>
        
            <p class="font-bold text-3xl text-gray-600 mt-12">The Secret Santa for Book Lovers allows you to organize your gift exchange online, quickly and for free.<p>
            <p class="font-bold text-3xl text-gray-600 mt-4">Create your First Group Now!<p>

            <div class="my-8">
                <a href="{{route('groups.create')}}" class="bg-blue-500 text-blue-50 text-xl uppercase hover:font-semibold p-2 rounded-sm px-4">Create group</a>
            </div>

            <div class="my-8">
                <a href="{{ route('books.index') }} " class="bg-blue-500 text-blue-50 text-xl uppercase hover:font-semibold p-2 rounded-sm px-4">Add books to your wishlist</a>
            </div>

            <div class="my-8">
                <a href=" " class="bg-blue-500 text-blue-50 text-xl uppercase hover:font-semibold p-2 rounded-sm px-4">Add the books you already have</a>
            </div>
            
            <p class="font-bold text-xl text-gray-600 mt-4">This should be a scrollable Landing Page with multiple CTA's<p>



            <p class="font-bold text-3xl text-gray-600 mt-200">THIS IS ONLY TO TAKE SPACE IN HE HOME PAGE<p>

        </div>

        <div>
            <div class="bg-purple-50 p-4 mb-8 rounded-2xl">
                <h3 class="font-semibold">Best Sellers</h3>
                
                HERE GOES AN IMAGE OF BEST SELLER BOOKS
                
            </div>

        </div>
    </div>


</x-site-layout>