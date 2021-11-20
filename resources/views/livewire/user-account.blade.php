<div>
    <div class="flex mx-auto lg:h-52 lg:w-52 z-10 relative lg:-my-24 w-36 h-36 -my-20">
        @if($picture)
        <img src="{{$picture}}" alt=""
            class="rounded-full border-4 border-white object-cover w-36 h-36 lg:h-52 lg:w-52">
        @else
        <img src="https://ui-avatars.com/api/name={{$nama}}&color=7F9CF5&background=EBF4FF" alt=""
            class="rounded-full border-4 border-white object-fit">
        @endif
    </div>

    <div class="bg-white overflow-y-hidden shadow-xl sm:rounded-lg relative">
        <div
            class="bg-white relative pb-4 w-full justify-center items-center overflow-hidden lg:rounded-lg shadow-lg mx-auto border-4 border-white">
            <div class="pb-28"></div>
            <div class="lg:flex lg:flex-row">
                <div class="w-full lg:col-span-1 gap-2">
                    <form wire:submit.prevent="storeProfil">
                        <div class="col-span-12 p-2">
                            <label class="block font-medium lg:text-md text-sm text-gray-700">Nama</label>
                            <input type="text" readonly wire:model.defer="nama"
                                class="rounded-md w-full shadow-sm bg-gray-200 hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                        </div>
                        <div class="col-span-12 p-2">
                            <label class="block font-medium lg:text-md text-sm text-gray-700">NIP</label>
                            <input type="text" readonly wire:model.defer="nip_baru"
                                class="rounded-md w-full shadow-sm bg-gray-200 hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                        </div>
                        <div class="col-span-12 p-2">
                            <label class="block font-medium lg:text-md text-sm text-gray-700">Email</label>
                            <input type="text" wire:model.defer="email"
                                class="rounded-md w-full shadow-sm bg-gray-100 hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                        </div>
                        <div class="col-span-12 p-2">
                            <button type="submit"
                                class="bg-green-600 w-full hover:bg-green-700 items-center rounded-lg text-white p-2">SIMPAN</button>
                        </div>
                    </form>
                </div>
                <div class="w-full lg:col-span-1 gap-2">
                    <form wire:submit.prevent="storePassword">
                        <div class="col-span-12 p-2">
                            <label class="block font-medium lg:text-md text-sm text-{{$color}}-700">Password Current</label>
                            <div class="flex flex-row rounded-md shadow-sm bg-{{$color}}-100 border-1 border-{{$color}}-200">
                                <input type="password" id="pwd" wire:model.defer="password_look"
                                    class="rounded-l-md border-{{$color}}-200 w-full hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 focus:ring">
                                <button type="button" class="bg-blue-600 rounded-r-md cursor-pointer"
                                    wire:click="$emit('passWord')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            @if($color == 'red')<label class="block font-medium lg:text-md text-xs text-red-700">Password sebelumnya tidak sesuai.</label>@endif
                            
                        </div>
                        <div class="col-span-12 p-2">
                            <label class="block font-medium lg:text-md text-sm text-gray-700">Password New</label>
                            <input type="password" wire:model.lazy="newPassword"
                                class="focus:ring-blue-300 rounded-md w-full shadow-sm bg-gray-100 hover:bg-blue-50 focus:ring-opacity-50 border-gray-200 focus:ring">
                        </div>
                        <div class="col-span-12 p-2">
                            <label class="block font-medium lg:text-md text-sm @if($newPassword == $retypePassword) text-gray-700 @else text-red-700 @endif">Password Retype @if($newPassword == $retypePassword) @else Password tidak match. @endif</label>
                            <input type="password" wire:model="retypePassword"
                                class="@if($newPassword == $retypePassword) focus:ring-gray-300 @else focus:ring-red-300 @endif rounded-md w-full shadow-sm @if($newPassword == $retypePassword) bg-gray-100 @else bg-red-100 @endif @if($newPassword == $retypePassword) hover:bg-gray-50 @else hover:bg-red-50 @endif focus:ring-opacity-50 border-gray-200 focus:ring">
                        </div>
                        <div class="col-span-12 p-2">
                            <button @if($newPassword == $retypePassword)  @else disabled @endif type="submit"
                                class="@if($newPassword == $retypePassword) bg-blue-600 hover:bg-blue-700 @else bg-blue-300 hover:bg-blue-300 @endif w-full items-center rounded-lg text-white p-2">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    document.addEventListener('livewire:load', function () {
        @this.on('passWord', () => {
            let pwds = document.getElementById('pwd');
            if (pwds.type == 'text') {
                pwds.type = 'password';
            } else {
                pwds.type = 'text';
            }
        });
    });
</script>
@endpush
