<x-site-layout>

    <div class="bg-gray-100 h-20 w-50 p-4 mb-8 rounded-2xl flex justify-center items-center mx-auto">
        <h2 class="font-bold">SECRET BOOKS</h2>
    </div>

    @if(Auth::user())
        <div class="flex justify-end">
            <a href="{{route('wishlist.show', Auth::user())}}" class="text-center bg-purple-500 text-purple-50 uppercase p-2 mb-4 hover:font-semibold rounded-xl">Your Wishlist</a> 
        </div>
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
                        <li class="bg-gray-100 p-6 rounded-2xl hover:bg-blue-50">
                            <a href="{{route('groups.show', $group)}}">
                                <h3 class="font-bold text-2xl">{{$group->name}}</h3>
                                <div class="flex justify-between items-center">
                                    <p class="text-gray-500 font-semibold line-clamp-2">Members ({{$group->users->count()}})</p>
                                </div>    
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        @endif
    @endif

    <div class="bg-gray-100 px-8 py-4 rounded-4xl max-w-lg mx-auto shadow-md mt-6 p-6">
        <div class="flex">
            <a href="{{ route('groups.joinGroupForm') }}" class="w-full text-center text-purple-500 uppercase p-2 mb-4 hover:font-semibold rounded-sm">-> Join a Group</a> 
        </div>
    
        <div class="flex">
            <a href="{{route('groups.create')}}" class="w-full text-center bg-purple-600 text-purple-50 uppercase p-2 hover:font-semibold rounded-2xl">+ Create New Group</a> 
        </div>
    </div>


</x-site-layout>