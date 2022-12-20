@extends("admin.admin")
@section("content")
    <h1 class="admin-title">
        Gallery Images
        <a href="{{route('gallery-images.create')}}">Add Gallery Image</a>
    </h1>

    <div class="admin-section grid grid-cols-6 gap-6">
        @foreach($images as $image)
            <div class="bg-dark bg-opacity-5 rounded-md overflow-hidden flex flex-col gap-2 p-2">
                <img src="{{ @App::make('url')->to('/').'/storage'.$image->url }}" alt="" class="w-full rounded-md">
                <p>Grid : {{$image->grid}}</p>
                <p>Featured : {{$image->featured ? 'Yes' : 'No'}}</p>
                <div class="flex items-center gap-2">
                    <form method="post" action="{{route('gallery-images.destroy',$image->id)}}">
                        @csrf
                        @method('delete')
                        <button class="bg-red flex items-center gap-1 text-white py-1 px-2 rounded-md text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                            </svg>
                            Delete
                        </button>
                    </form>

                    <a class="bg-primary px-2 py-0.5 text-white rounded" href="{{route('gallery-images.edit',$image->id)}}">
                        Edit
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
