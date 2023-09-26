@extends('layout.app')

@section('title', 'TWG | registration')

@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="px-8 py-6 mx-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
            <h3 class="text-2xl font-bold text-center">Join us</h3>
            <form action="{{route('reg.store')}}" method="POST">
                @csrf
                <div class="mt-4">
                    <div>
                        <label class="block" for="username">Username<label>
                                <input type="text" placeholder="Username" id="username" name="username"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    value="{{ old('username') }}"/>
                                @error('username')
                                    <small class="text-red-400">{{ $message }}</small>
                                @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block" for="email">Email<label>
                                <input type="text" placeholder="Email" id="email" name="email"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-red-400">{{ $message }}</small>
                                @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block" for="password">Password<label>
                                <input type="password" placeholder="Password" id="password" name="password"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <small class="text-red-400">{{ $message }}</small>
                                @enderror
                    </div>
                    <div class="flex">
                        <button type="submit" class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900 transition-all">Create
                            Account</button>
                    </div>
                    <div class="mt-6 text-grey-dark">
                        Already have an account?
                        <a class="text-blue-600 transition-all hover:underline " href="{{route('login')}}">
                            Log in
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
