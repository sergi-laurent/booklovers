<x-site-layout>

    <div class="text-right flex justify-end gap-2">
		<a href="{{route('books.edit', $book)}}" class="bg-blue-100 text-blue-500 uppercase p-2 hover:font-semibold rounded-sm">Edit Book</a>
		<form action="{{route('books.destroy', $book)}}" method="post">
			@method('DELETE')
			@csrf
			<button type="submit" class="bg-red-100 text-red-500 uppercase p-2 hover:font-semibold rounded-sm">Delete Book</button>
		</form>

	</div>

    <h1 class="font-bold text-2xl">{{$book->title}}</h1>
    <div class="flex gap-1">
        <p class="line-clamp-2 mt-2 flex">By 
        <p class="line-clamp-2 mt-2 flex font-semibold">{{$book->author}}</p>
    </div>

    <p class="mt-4">{{$book->summary}}<p>
</x-site-layout>