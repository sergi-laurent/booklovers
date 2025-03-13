<x-site-layout>
    <div class="max-w-6xl mx-auto grid grid-cols-2 gap-x-12 mt-20">
        
        <!-- Left Column -->
        <div class="col-span-1 flex flex-col justify-center">
            <h1 class="font-bold text-5xl text-blue-500 leading-tight">Secret Books</h1>
            <h2 class="font-bold text-3xl text-gray-500">The Secret Santa for Book Lovers</h2>
        
            <p class="font-semibold text-2xl text-gray-600 mt-6 leading-relaxed">
                The Secret Santa for Book Lovers allows you to organize your gift exchange online, quickly and for free.
            </p>

            <!-- 🚀 Optimized CTA Section -->
            <div class="mt-10">
                <p class="text-lg text-gray-700 mb-4">Join thousands of book lovers making gifting magical!</p>
                
                <a href="{{ route('groups.create') }}" 
                   class="bg-blue-500 text-white text-2xl font-semibold uppercase rounded-xl py-4 px-6 block text-center shadow-lg hover:bg-blue-600 transition">
                   🎁 Create Your Group Now
                </a>

                <p class="text-gray-500 text-center mt-4 text-lg">Already in a group?</p>

                <a href="{{ route('login') }}" 
                   class="bg-gray-200 text-gray-800 text-lg font-semibold rounded-xl py-3 px-6 block text-center shadow-md hover:bg-gray-300 transition">
                   Log in to Access Your Group
                </a>
            </div>
        </div>

        <!-- Right Column -->
        <div>
            <div class="bg-gray-100 h-[600px] p-6 mb-8 rounded-2xl flex flex-col items-center justify-center shadow-md">
                <h3 class="font-semibold text-xl text-gray-700 mb-4">📚 Best Sellers</h3>
                
                <!-- Placeholder Image -->
                <!--<img src="https://via.placeholder.com/500x400" alt="Best Seller Books" 
                     class="rounded-lg shadow-md object-cover w-full h-full">-->
            </div>
        </div>

    </div>
</x-site-layout>