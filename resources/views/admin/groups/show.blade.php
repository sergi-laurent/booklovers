<x-site-layout>

    <div class="bg-gray-100 h-20 w-50 p-4 mb-8 rounded-2xl flex justify-center items-center mx-auto">
        <h2 class="font-bold">SECRET BOOKS</h2>
    </div>

    <div class="bg-gray-100 m-auto p-4 rounded-2xl justify-center items-center mx-auto flex flex-col">
        <h1 class="font-bold text-2xl">{{$group->name}}</h1>
        <p class="text-lg mt-2">{{$group->code}}</p>
    </div>

    <!--Message for Feedback--> 
    <div class="my-4">
        <x-feedback-message type="success" />
        <x-feedback-message type="error" />
    </div>
    
    <!--List of Members-->
    
    <div class="flex items-center justify-between px-4">
        <div class="flex">
            <h3 class="text-black text-2xl font-semibold line-clamp-2 ">Members</h3>
            <h3 class="text-gray-500 text-2xl font-semibold line-clamp-2 mx-2">({{$group->users->count()}})</h3>
        </div>

        <div class="flex justify-end pl-6">
            <x-top-right-button :route="route('groups.addMemberForm', $group->id)" text="+ Add Member" />
        </div>
    </div>

    <ul class="grid grid-cols-1 gap-4 mt-4">
        
        @foreach($group->users as $user)
            <li class="bg-gray-100 p-6 rounded-2xl hover:bg-blue-50">

                <div class="flex justify-between items-center">
                    <p class="font-semibold text-xl">{{$user->name}}</p>
                    <div class="text-right flex justify-end gap-4 mt-2">
                        <a href="{{route('wishlist.show', $user)}}" class="bg-purple-100 text-purple-500 uppercase p-2 px-4 hover:font-semibold  rounded-2xl">Wishlist</a>
                        <a href="{{route('library.show', $user)}}" class="bg-blue-100 text-blue-500 uppercase p-2 px-4  hover:font-semibold rounded-2xl">Library</a>
                        <form action="{{ route('admin.groups.removeMember', [$group, $user]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="block text-center bg-red-100 text-red-500 uppercase p-2 px-4 hover:font-semibold  rounded-xl">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>    
                
            </li>
        @endforeach
        
    </ul>

</x-site-layout>