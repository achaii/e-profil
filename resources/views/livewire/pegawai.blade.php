<div>
    <div class="p-4 bg-white overflow-y-hidden shadow-xl sm:rounded-lg relative">
        <div class="h-max">
            {{-- <h3 class="text-lg">DATA PEGAWAI</h3>
            <small class="pt-1">data pegawai dinas ...</small> --}}

            <div class="col-span-12 pt-2">
                <div class="flex flex-row text-black border-1 border-gray-200 rounded-md shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 rounded-l-md bg-gray-100 p-2" fill="none"
                        viewBox="0 0 22 22" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" wire:model="cari"
                        class="w-full h-10  bg-gray-50 hover:bg-blue-50 focus:ring-opacity-50 border-gray-100 focus:ring-blue-300 focus:ring">
                    <button wire:click="showModalGlobal('add')" type="button"
                        class="flex flex-row items-center bg-blue-500 p-2 rounded-r-md z-0 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <div class="text-sm pl-2 pr-2 text-white">TAMBAH</div>
                    </button>
                </div>
            </div>
            <div class="col-span-12 pt-2">
                <div class="lg:overflow-hidden overflow-auto">
                    <table class="table-responsive lg:w-full md:w-full w-max">
                        <thead>
                            <tr class="bg-gray-200 text-sm border-b-2 text-gray-600 border-gray-400">
                                <th class="py-2 px-3 text-left w-max rounded-tl-md">Nama Pegawai & NIP</th>
                                <th class="py-2 px-3 text-left w-max">Unit Kerja Utama</th>
                                <th class="py-2 px-3 text-center w-24 rounded-tr-md">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($getPegawai) --}}
                            @forelse ($getPegawai as $pegawai)
                            <tr class="hover:bg-blue-100 border-2 border-gray-200">
                                <td class="py-3 px-2">
                                    <p class="uppercase text-lg">
                                        {{$pegawai->nama}}
                                    </p>
                                    <p>
                                        NIP {{$pegawai->nip_baru}}
                                    </p>
                                </td>
                                <td class="py-3 px-2">
                                    <div class="text-ms">{{$pegawai->unita}}</div>
                                    <div class="text-ms">{{$pegawai->unitb}}</div>
                                </td>
                                <td class="py-3 px-3">
                                    <div class="flex">
                                        <button wire:click="showUserPegawai({{$pegawai->id}},'edit')"
                                            class="flex-1 mr-1 bg-blue-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-blue-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                        <button wire:click="$emit('targetID',{{$pegawai->id}})"
                                            class="flex-1 mr-1 bg-green-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-green-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                              </svg>
                                        </button>
                                        <button  wire:click="deleteUserPegawai({{$pegawai->id}})"
                                            onclick="confirm('Yakin anda ingin menghapus ({{$pegawai->nama}}) ?') || event.stopImmediatePropagation()"
                                            class="flex-1 bg-red-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-red-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="bg-blue-100 p-5 text-2xl text-whtie">
                                    <div class="text-center font-medium uppercase">
                                        data belum ada
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="pt-2 pb-4">
                    {{$getPegawai->links()}}
                </div>
            </div>
        </div>
    </div>

    <x-modal wire:model="addModalGlobal">
        @if($addMenu == 'edit')
        <form wire:submit.prevent="updateUserPegawai">
            <input type="hidden" wire:model="getID">
            @elseif($addMenu == 'add')
            <form wire:submit.prevent="storeUserPegawai">
                @endif
                <div class="bg-gray-300 p-2 text-center">
                    <div class="lg:text-2xl text-md text-gray-800 font-medium">TAMBAH DATA PEGAWAI</div>
                </div>
                <div class="h-max flex flex-row gap-2 pt-0">
                    <div class="w-full m-1 col-span-1">
                        <div class="col-span-12 p-2">
                            <label class="block font-medium text-md text-gray-700">Nama Pegawai</label>
                            <input type="text" wire:model.defer="nama" required
                                class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                        </div>
                        <div class="col-span-12 p-2">
                            <label class="block font-medium text-md text-gray-700">NIP Pegawai</label>
                            <input type="text" wire:model.defer="nip_baru" required
                                class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                        </div>
                        <div class="col-span-12 p-2">
                            <label class="block font-medium text-md text-gray-700">Unit Kerja</label>
                            <select wire:model="unit_kerja" required
                                class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                                <option value="">-</option>
                                @foreach ($getUnitKerja as $unitKerja)
                                <option value="{{$unitKerja->id}}">{{$unitKerja->unit_kerja}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 p-2">
                            <label class="block font-medium lg:text-md text-sm text-gray-700">Sub Unit Kerja</label>
                            <select wire:model="sub_unit_kerja" @if($unit_kerja == null) readonly @endif
                                class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                                <option value="">-</option>
                                @foreach ($getSubUnitKerja as $subUnitKerja)
                                <option value="{{$subUnitKerja->id}}">{{$subUnitKerja->unit_kerja}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 p-3">
                            <div class="flex flex-row">
                                <button type="submit" wire:loading.attr="disabled"
                                    class="bg-green-600 w-full hover:bg-green-700  items-center rounded-l-lg text-white p-2">SIMPAN</button>
                                <button type="button" wire:loading.attr="disabled"
                                    wire:click="$toggle('addModalGlobal')"
                                    class="bg-gray-600 hover:bg-gray-700 items-center rounded-r-lg text-white p-2">BATAL</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </x-modal>
</div>

@push('js')
<script>
    document.addEventListener('livewire:load', function () {
        @this.on('getTargetID',() => {
            window.open('{{route('profil')}}','_blank');
        });
    });
</script>
@endpush
