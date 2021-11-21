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
                <h1 class="text-xl md:text-2xl font-bold leading-tight mt-0 text-center uppercase text-gray-700">
                    Silahkan Masuk
                    {{-- <span class="text-white bg-blue-800 rounded-md p-0.5"></span> --}}
                </h1>
                <form class="mt-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label class="block text-gray-800 font-medium">NIP</label>
                        <input id="nip_baru" name="nip_baru" type="number" placeholder="..."
                            :value="old('nip_baru')"
                            class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring"
                            autofocus autocomplete required>
                            @if($errors->has('nip_baru') or $errors->has('password'))
                                <label class="text-red-400 text-xs">NIP atau Password Anda Masukan Salah.</label>
                            @endif
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-800 font-medium">Password</label>
                        <input id="password" name="password" type="password" placeholder="..."
                            {{-- minlength="6" --}}
                            class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring"
                            required>
                    </div>
                    {{-- <div class="text-right mt-2">
                        <a href="#"
                            class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Lupa
                            Password?</a>
                    </div> --}}
                    <button type="submit" class="w-full block bg-blue-600 hover:bg-blue-700 focus:bg-blue-400 text-white font-semibold rounded-lg
                        px-4 py-2 mt-6">LOGIN</button>

                </form>
                <a href="{{route('register')}}" class="w-full text-center block bg-gray-600 hover:bg-gray-700 focus:bg-gray-400 text-white font-semibold rounded-lg
                px-4 py-2 mt-2">REGISTRASI</a>
                {{-- <hr class="my-6 border-gray-300 w-full"> --}}
                <p class="pt-5 text-center">©2021</p>
            </div>
        </div>
    </div>
</x-guest-layout>
