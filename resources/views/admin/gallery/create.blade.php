@extends("admin.admin")
@section("content")
    <h1 class="admin-title">Add Gallery Image</h1>

    <form method="post" action="{{route('gallery-images.store')}}" class="admin-section max-w-xl"
          enctype="multipart/form-data">
        @csrf
        <div class="flex w-full input-group flex-col">
            <label>Image</label>
            <label for="image"
                   class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-primary border-dashed cursor-pointer ">
                <span class="flex flex-col justify-center items-center pt-5 pb-6">
                    <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <span class="mb-2 text-sm  block "><span
                            class="font-semibold">Click to upload</span> or drag and drop</span>
                    <p class="text-xs ">SVG, PNG, JPG, JPEG (450px750px)</p>
                </span>
                <input id="image" name="image" type="file" class="hidden"
                       accept="image/png, image/jpg, image/svg, image/jpeg"/>
            </label>
            @error('image')
            <span class="error-label" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>



        <div class="flex w-full input-group flex-col">
            <label>Featured Image</label>
            <label for="featured_image"
                   class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-primary border-dashed cursor-pointer ">
                <span class="flex flex-col justify-center items-center pt-5 pb-6">
                    <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <span class="mb-2 text-sm  block "><span
                            class="font-semibold">Click to upload</span> or drag and drop</span>
                    <p class="text-xs ">SVG, PNG, JPG, JPEG </p>
                </span>
                <input id="featured_image" name="featured_image" type="file" class="hidden"
                       accept="image/png, image/jpg, image/svg, image/jpeg"/>
            </label>
            @error('featured_image')
            <span class="error-label" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>




        <div class="input-group">
            <label for="grid">Number Of Cols </label>
            <input type="number" value="1" name="grid">
            <span>From a grid of 12 columns, how many columns this image will expand</span>
            @error('grid')
            <span class="error-label" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
        <label for="featured" class="flex items-center gap-2">
            <input class="form-check-input"  value="off" type="checkbox" name="featured" id="featured">
            Featured (show in homepage)
        </label>
        @error('featured')
        <span class="error-label" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="submit" value="save">
    </form>
@endsection
