@extends("admin.admin") 
@section("content")
<h1 class="admin-title">
    Menus
    <a href="{{route('menus.create')}}">Add Menu</a>
</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Number Of Cusisines</th>
            <th>Menu PDF FIle</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
            <tr>
                @if ($menu->name)
                <td>{{$menu->name}}</td>
                @endif
                <td></td>
                <td>
                    <a class="inline-flex items-center bg-primary text-white px-2 py-1 rounded gap-2 text-sm" href="{{ @App::make('url')->to('/').'/storage'.$menu->pdf }}" alt="" class="w-full rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                          
                        View PDF
                    </a>
                </td>
                <td class="flex items-center justify-center gap-3">
           
                    <form method="post" action="{{route('menus.destroy',$menu->id)}}">
                        @csrf
                        @method('delete')
                        <button href="" style="color: red">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                              </svg>
                        </button>
                    </form>
         
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection