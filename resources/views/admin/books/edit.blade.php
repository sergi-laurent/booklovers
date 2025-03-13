<x-site-layout>

    <x-form 
        :action="route('admin.books.update', $book)" 
        method="put" 
        title='Update Book' 
        :cancelurl="route('admin.books.show', $book)" 
        submittext="Update Book">

        <x-form-input name='title' label='Book title' placeholder='Write the title here' :value='$book->title'/>

        <x-form-input name='author' label='Author name' placeholder='Write the author of this book here' :value='$book->author'/>

        <x-form-text-area name='summary' label='Book summary' rows='7' placeholder='Write the summary of the book here' :value='$book->summary'/>

        

    </x-form>
    
</x-site-layout>