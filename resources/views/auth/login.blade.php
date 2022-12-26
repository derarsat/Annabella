@extends('layouts.app')
@section('content')
<div class="h-screen flex items-center justify-center">
    <form method="POST" class="flex flex-col  w-[32rem] gap-4 rounded-md p-8 bg-lightGrey shadow-md" action="{{ route('login') }}">
        @csrf
        <h1 class="text-2xl mt-4 mb-6 font-medium">Login </h1>
        <div>
            <label class="font-medium  mb-2 block" for="email">Email Address</label>
            <div>
                <input class="w-full px-4 h-10 outline-none bg-white" id="email" type="email" name="email" autofocus> @error('email')
                <span class="text-red mt-1 block text-sm">
                    {{ $message }}
                    </span> @enderror
            </div>
        </div>

        <div>
            <label class="font-medium  mb-2 block" for="password">Password</label>

            <div>
                <input class="w-full px-4 h-10 outline-none bg-white" id="password" name="password" type="password"> @error('password')
                <span class="text-red mt-1 block text-sm">
                    {{ $message }}
                </span> @enderror
            </div>
        </div>

        <div>
            <div>
                <button type="submit" class="bg-blue mt-2 px-6 py-2 text-white font-medium rounded">
                    Login
                </button> 
            </div>
        </div>
    </form>
</div>
    
@endsection