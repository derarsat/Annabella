@extends("admin.admin") @section("content")
<h1 class="admin-title">Add Menu</h1>
<form action="{{route('menus.store')}}" method="post" enctype="multipart/form-data" class="grid grid-cols-2 gap-12">
    @csrf
    <div>
        <div class="input-group">
            <label for="name">Name </label>
            <input type="text" name="name"> @error('name')
            <span class="error-label" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="input-group">
            <label for="pdf"> Menu PDF file:</label>
            <input id="pdf" name="pdf" type="file" style="padding-top: 5px" accept="application/pdf">@error('pdf')
            <span class="error-label" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <input type="submit" value="save">
</form>
@endsection