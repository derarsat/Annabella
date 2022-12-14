@extends("admin.admin") 
@section("content")
<h1 class="admin-title">
    All Reservations
</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Number Of People</th>
            <th>Date</th>
            <th>Time</th>
            <th>Archive</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <td>{{$reservation->name}}</td>
                <td>{{$reservation->email}}</td>
                <td>{{$reservation->people}} People</td>
                <td>{{$reservation->date}}</td>
                <td>{{$reservation->time}}</td>
                <td>
                    @if (!$reservation->archived)
                    <form action="/admin/reservations/archive" method="post">
                        @csrf
                        <input name="id" type="hidden" value="{{$reservation->id}}">
                        <button class="flex items-center gap-2 bg-primary px-2 py-1 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                              </svg>
                            Archive                          
                        </button>
                        </form>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                          </svg>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection