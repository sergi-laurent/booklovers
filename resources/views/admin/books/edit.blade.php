<x-site-layout>

    <x-form 
        :action="route('admin.books.update', $book)" 
        method="put" 
        title='Update Book' 
        :cancelurl="route('admin.books.show', $book)" 
        submittext="Update Book">

        <x-form-input name='title' label='Book title' placeholder='Write the title here' :value='$book->title'/>

        <x-form-input name='author' label='Author name' placeholder='Write the author of this book here' :value='$book->author'/>

        <div class="mb-8">
            <label for="cover" class="block font-medium">Upload Book Cover</label>
            <input name="cover" type="file">
            <!-- If there is a validation  error -->
            @error("cover")
                <div class="text-sm p-2 text-red-500">
                    {{$message}}
                </div>
            @enderror
        </div>

        <x-form-text-area name='summary' label='Book summary' rows='7' placeholder='Write the summary of the book here' :value='$book->summary' rte/>

    </x-form>
    
</x-site-layout>