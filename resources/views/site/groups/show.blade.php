<x-site-layout>
    
    <div class="bg-gray-100 h-20 w-50 p-4 mb-8 rounded-2xl flex justify-center items-center mx-auto">
        <h2 class="font-bold">SECRET BOOKS</h2>
    </div>

    <div class="bg-gray-100 m-auto p-4 mb-8 rounded-2xl flex justify-center items-center mx-auto">
        <h1 class="font-bold text-2xl">{{$group->name}}</h1>
    </div>
    
    <div class="flex items-center justify-between px-4">
        <div class="flex">
            <h3 class="text-black text-2xl font-semibold line-clamp-2 ">Members</h3>
            <h3 class="text-gray-500 text-2xl font-semibold line-clamp-2 mx-2">({{$group->users->count()}})</h3>
        </div>


    <ul class="grid grid-cols-1 gap-4 mt-4">
        
        @foreach($group->users as $user)
            <li class="bg-gray-100 p-6 rounded-2xl hover:bg-blue-50">

                <div class="flex justify-between items-center">
                    <p class="font-semibold text-xl">{{$user->name}}</p>
                </div>    
                
            </li>
        @endforeach
        
    </ul>
        
    

</x-site-layout>