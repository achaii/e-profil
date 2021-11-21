<x-guest-layout>
    <div class=" flex flex-col md:flex-row h-screen z-0">
        <div class="text-white hidden items-stretch lg:block w-full md:w-1/2 xl:w-2/3 h-screen relative">
            <img src="{{asset('bg.jpg')}}" class="w-full h-full object-cover">
            <div class="absolute bg-green-500 opacity-40 inset-0 z-0"></div>
            <div class="w-full px-24 inset-y-1/3 absolute">
                <img src="{{asset('logo.png')}}" class="w-full h-3/4">
            </div>
        </div>
        <img class="w-screen h-screen bg-green-500 bg-fixed bg-cover object-cover lg:hidden lg:static relative opacity-40" src="{{asset('bg.jpg')}}">
        {{-- <div class="lg:static absolute w-full z-50 md:max-w-md lg:max-w-full md:mx-auto md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center z-10"> --}}
        <div class="lg:static absolute w-full z-50 lg:max-w-full xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center z-10">
            <div class="w-full h-auto justify-center">
                {{-- <div class="flex gap-3 justify-center">
                    <img src="" class="w-20 h-20">
                    <img src="" class="w-20 max-h-20">
                </div> --}}
                <h1 class="text-xl md:text-2xl font-bold leading-tight mt-0 text-center uppercase text-gray-700 pb-5">
                    Silahkan Melakukan Registrasi
                    {{-- <span class="text-white bg-blue-800 rounded-md p-0.5"></span> --}}
                </h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <x-label for="nip" :value="__('NIP')" />
                        <x-input placeholder="..." id="nip_baru" class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring" type="number" name="nip_baru" :value="old('nip_baru')" required autofocus />
                        @if(session()->has('msgBelumAda')) <label class="text-red-400 text-xs">{{session()->get('msgBelumAda')}}</label> @endif
                        @if(session()->has('msgSudahAda')) <label class="text-red-400 text-xs">{{session()->get('msgSudahAda')}}</label> @endif
                    </div>
            
                    {{-- <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring" type="email" name="email" :value="old('email')" required />
                    </div> --}}
            
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />
                        <x-input placeholder="..." id="password" class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>
            
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-input placeholder="..." id="password_confirmation" class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                    <button type="submit" class="w-full block bg-gray-600 hover:bg-gray-700 focus:bg-gray-400 text-white font-semibold rounded-lg
                    px-4 py-2 mt-6">REGISTRASI</button>

                    <a href="{{route('login')}}" class="w-full block text-center bg-blue-600 hover:bg-blue-700 focus:bg-blue-400 text-white font-semibold rounded-lg
                    px-4 py-2 mt-2">LOGIN</a>
                    {{-- <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <x-button class="ml-4">
                            {{ __('Register') }}
                        </x-button>
                    </div> --}}
                </form>
                {{-- <hr class="my-6 border-gray-300 w-full"> --}}
                <p class="pt-5 text-center">©2021</p>
            </div>
        </div>
    </div>
</x-guest-layout>


{{-- <x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>

        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-button class="ml-4">
                {{ __('Register') }}
            </x-button>
        </div>
    </form>
</x-auth-card> --}}