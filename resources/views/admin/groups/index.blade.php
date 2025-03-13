<x-site-layout>

    <div class="bg-gray-100 h-16 w-64 p-4 mb-8 rounded-2xl flex justify-center items-center mx-auto">
        <h2 class="font-bold text-xl">SECRET BOOKS</h2>
    </div>

    <!--Message for Feedback--> 
    <div class="my-4">
        <x-feedback-message type="success" />
        <x-feedback-message type="error" />
    </div>

    <!-- Pagination Links -->
    <div class="mt-8">
        {{ $groups->links('pagination::tailwind') }}
    </div>

    @if(auth()->user())
        @if($groups->isEmpty())
            <div class="text-gray-500 font-bold text-2xl text-center">
            There are no groups yet
            </div>
        @else
            <ul class="grid grid-cols-1 gap-4">
                @if($groups->isEmpty())
                There are no groups yet
                @else
                    @foreach($groups as $group)
                        <x-group-card :group="$group" />
                    @endforeach
                @endif
            </ul>
        @endif
    @endif

    <div class="bg-gray-100 px-8 py-6 rounded-xl max-w-lg mx-auto shadow-md mt-6">

        <!-- Create a New Group Button -->
        <a href="{{ route('groups.create') }}" 
           class="bg-purple-600 text-white text-2xl font-semibold uppercase rounded-xl py-4 px-6 block text-center shadow-lg hover:bg-purple-700 transition">
           ✨ Create New Group
        </a>
    
    </div>


</x-site-layout>