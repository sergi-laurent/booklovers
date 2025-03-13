<x-site-layout>

    <div class="bg-gray-100 h-16 w-64 p-4 mb-8 rounded-2xl flex justify-center items-center mx-auto">
        <h2 class="font-bold text-xl">SECRET BOOKS</h2>
    </div>

    @if(Auth::user())
        <x-top-right-button :route="route('wishlist.show', ['user' => Auth::user()->id])" text="Your Wishlist" />
    @endif

    <!--Message for Feedback--> 
    <div class="my-4">
        <x-feedback-message type="success" />
        <x-feedback-message type="error" />
    </div>

    @if(auth()->user())
        @if($groups->isEmpty())
            <div class="text-gray-500 font-bold text-2xl text-center">
            You don't have any groups yet
            </div>
        @else
            <ul class="grid grid-cols-1 gap-4">
                @if($groups->isEmpty())
                You don't have any groups yet
                @else
                    @foreach($groups as $group)
                        <x-group-card :group="$group" />
                    @endforeach
                @endif
            </ul>
        @endif
    @endif

    <div class="bg-gray-100 px-8 py-6 rounded-xl max-w-lg mx-auto shadow-md mt-6">
    
        <!-- Join a Group Button -->
        <a href="{{ route('groups.joinGroupForm') }}" 
           class="bg-gray-200 text-gray-800 text-lg font-semibold rounded-xl py-3 px-6 block text-center shadow-md hover:bg-gray-300 transition mb-4">
           ➡️ Join a Group
        </a> 
    
        <!-- Create a New Group Button -->
        <a href="{{ route('groups.create') }}" 
           class="bg-purple-600 text-white text-2xl font-semibold uppercase rounded-xl py-4 px-6 block text-center shadow-lg hover:bg-purple-700 transition">
           ✨ Create New Group
        </a>
    
    </div>

</x-site-layout>