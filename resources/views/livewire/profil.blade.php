<div>
    @if(Session::get('id'))
    <div class="col-span-12 my-2 absolute">
        <button wire:click="rollback" class="bg-red-500 w-full p-2 rounded-lg text-white">ROLLBACK PROFIL</button>
    </div>
    @endif
    <div class="flex mx-auto lg:h-52 lg:w-52 z-10 relative lg:-my-24 w-36 h-36 -my-20">
        @if($picture)
        <img src="{{$picture}}" alt="" class="rounded-full border-4 border-white object-cover w-36 h-36 lg:h-52 lg:w-52">
        @else
        <img src="https://ui-avatars.com/api/name={{$nama}}&color=7F9CF5&background=EBF4FF" alt=""
            class="rounded-full border-4 border-white object-fit w-36 h-36 lg:h-52 lg:w-52">
        @endif
    </div>
    <div class="bg-white overflow-y-hidden shadow-xl sm:rounded-lg relative"
        x-data="{ profil:true, pendidikan_formal:false, pendidikan_non_formal:false, keluarga:false, jabatan:false, pangkat_golongan:false }">
        <div
            class="bg-white relative pb-4 w-full justify-center items-center overflow-hidden lg:rounded-lg shadow-lg mx-auto border-4 border-white">
            <div class="pb-28"></div>
            <div class="mr-3 ml-3 justify-center lg:flex lg:border-1 lg:rounded-lg lg:border-gray-200 lg:shadow">
                <button
                    class="lg:flex-1 w-full bg-gray-100 text-xs font-bold uppercase cursor-pointer pr-2 pl-2 pt-3 pb-3 focus:text-white text-gray-600 hover:bg-blue-400 hover:text-yellow-50 lg:rounded-l-lg"
                    :class="{'bg-blue-500 text-yellow-50' : profil, 'bg-gray-100' : ! profil}"
                    @click="profil=true,pendidikan_formal=false,pendidikan_non_formal=false,keluarga=false,jabatan=false,pangkat_golongan=false">Profil</button>
                <button
                    class="lg:flex-1 w-full bg-gray-100 text-xs font-bold uppercase cursor-pointer pr-2 pl-2 pt-3 pb-3 focus:text-white text-gray-600 hover:bg-blue-400 hover:text-yellow-50"
                    :class="{'bg-blue-500 text-yellow-50' : jabatan, 'bg-gray-100' : ! jabatan}"
                    @click="profil=false,pendidikan_formal=false,pendidikan_non_formal=false,keluarga=false,jabatan=true,pangkat_golongan=false">Riwayat Jabatan</button>
                <button
                    class="lg:flex-1 w-full bg-gray-100 text-xs font-bold uppercase cursor-pointer pr-2 pl-2 pt-3 pb-3 focus:text-white text-gray-600 hover:bg-blue-400 hover:text-yellow-50"
                    :class="{'bg-blue-500 text-yellow-50' : pangkat_golongan, 'bg-gray-100' : ! pangkat_golongan}"
                    @click="profil=false,pendidikan_formal=false,pendidikan_non_formal=false,keluarga=false,jabatan=false,pangkat_golongan=true">Riwayat Pangkat dan Golongan</button>
                <button
                    class="lg:flex-1 w-full bg-gray-100 text-xs font-bold uppercase cursor-pointer pr-2 pl-2 pt-3 pb-3 focus:text-white text-gray-600 hover:bg-blue-400 hover:text-yellow-50"
                    :class="{'bg-blue-500 text-yellow-50' : pendidikan_formal, 'bg-gray-100' : ! pendidikan_formal}"
                    @click="profil=false,pendidikan_formal=true,pendidikan_non_formal=false,keluarga=false,jabatan=false,pangkat_golongan=false">Riwayat Pendidikan
                    Formal</button>
                <button
                    class="lg:flex-1 w-full bg-gray-100 text-xs font-bold uppercase cursor-pointer pr-2 pl-2 pt-3 pb-3 focus:text-white text-gray-600 hover:bg-blue-400 hover:text-yellow-50"
                    :class="{'bg-blue-500 text-yellow-50' : pendidikan_non_formal, 'bg-gray-100' : ! pendidikan_non_formal}"
                    @click="profil=false,pendidikan_formal=false,pendidikan_non_formal=true,keluarga=false,jabatan=false,pangkat_golongan=false">Riwayat Pendidikan
                    Non Formal</button>
                <button
                    class="lg:flex-1 w-full bg-gray-100 text-xs font-bold uppercase cursor-pointer pr-2 pl-2 pt-3 pb-3 focus:text-white text-gray-600 hover:bg-blue-400 hover:text-yellow-50 lg:rounded-r-lg"
                    :class="{'bg-blue-500 text-yellow-50' : keluarga, 'bg-gray-100' : ! keluarga}"
                    @click="profil=false,pendidikan_formal=false,pendidikan_non_formal=false,keluarga=true,jabatan=false,pangkat_golongan=false">Anggota Keluarga</button>
            </div>

            <div id="profil" x-show="profil" class="pt-5">
                <form wire:submit.prevent="storeUser">
                    <div class="h-max lg:flex lg:flex-row gap-2">
                        <div class="lg:w-full lg:m-1 col-span-1">
                            <div class="col-span-12 p-2">
                                <label class="block font-medium lg:text-md text-sm text-gray-700">NIP Baru</label>
                                <input type="text" wire:model.defer="nip_baru" disabled
                                    class="rounded-md w-full shadow-sm bg-gray-100 hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                            <div class="col-span-12 p-2">
                                <label class="block font-medium lg:text-md text-sm text-gray-700">NIP Lama</label>
                                <input type="text" wire:model.defer="nip_lama" disabled
                                    class="rounded-md w-full shadow-sm bg-gray-100 hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                            <div class="col-span-12 p-2">
                                <label class="block font-medium lg:text-md text-sm text-gray-700">Nama Pegawai</label>
                                <input type="text" wire:model.defer="nama"
                                    class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                            <div class="col-span-12 p-2">
                                <div class="lg:flex lg:flex-row lg:gap-1">
                                    <div class="w-full ">
                                        <label class="block font-medium lg:text-md text-sm text-gray-700">Tempat Lahir</label>
                                        <input placeholder="Tempat Lahir" type="text" wire:model.defer="tempat_lahir"
                                        class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                                    </div>
                                    <div class="w-full pt-3 lg:pt-0">
                                        <label class="block font-medium lg:text-md text-sm text-gray-700">Tanggal Lahir</label>
                                        <input placeholder="Tanggal Lahir" type="date" wire:model.defer="tanggal_lahir"
                                            class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 p-2">
                                <label class="block font-medium lg:text-md text-sm text-gray-700">Jenis Kelamin</label>
                                <select wire:model.defer="jenis_kelamin"
                                    class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                                    <option value="">-</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="col-span-12 p-2">
                                <label class="block font-medium lg:text-md text-sm text-gray-700">Alamat</label>
                                <textarea cols="30" rows="5" wire:model.defer="alamat"
                                    class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring"></textarea>
                            </div>
                        </div>
                        <div class="lg:w-full lg:m-1 col-span-1">
                            <div class="col-span-12 p-2">
                                <div class="lg:flex lg:flex-row lg:gap-1">
                                    <div class="w-full">
                                        <label class="block font-medium lg:text-md text-sm text-gray-700">No NPWP</label>
                                        <input placeholder="Nomor NPWP" type="text" wire:model.defer="nomor_npwp"
                                            class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                                    </div>
                                    <div class="w-full pt-3 lg:pt-0">
                                        <label class="block font-medium lg:text-md text-sm text-gray-700">Tanggal NPWP</label>
                                        <input placeholder="" type="date" wire:model.defer="tanggal_npwp"
                                            class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 p-2">
                                <label class="block font-medium lg:text-md text-sm text-gray-700">No KTP</label>
                                <input placeholder="Nomor KTP" type="number" wire:model.defer="nomor_ktp"
                                    class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                            <div class="col-span-12 p-2">
                                <div class="lg:flex lg:flex-row lg:gap-1">
                                    <div class="w-full">
                                        <label class="block font-medium lg:text-md text-sm text-gray-700">No BPJS</label>
                                        <input placeholder="Nomor BPJS" type="text" wire:model.defer="nomor_bpjs"
                                            class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                                    </div>
                                    <div class="w-full pt-3 lg:pt-0">
                                        <label class="block font-medium lg:text-md text-sm text-gray-700">Tanggal BPJS</label>
                                        <input placeholder="" type="date" wire:model.defer="tanggal_bpjs"
                                            class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 p-2">
                                <label class="block font-medium lg:text-md text-sm text-gray-700">Jabatan</label>
                                <select wire:model.defer="jabatan"
                                    class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                                    <option value="">-</option>
                                    @foreach ($getJabatan as $jabatan)
                                        <option value="{{$jabatan->nama_jabatan}}">{{$jabatan->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-12 p-2">
                                <label class="block font-medium lg:text-md text-sm text-gray-700">Unit Kerja</label>
                                <select wire:model="unit_kerja"
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
                            <div class="col-span-12 p-2">
                                <label class="block font-medium lg:text-md text-sm text-gray-700">Pas Foto</label>
                                <input type="hidden" wire:model="picture">
                                <input placeholder="" type="file" id="picture_id" wire:change="$emit('PictureId')"
                                    class="w-full shadow-sm p-3 border-1 shadow-sm rounded-md hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                        </div>
                    </div>
                    <div class="flex p-2">
                        <button type="submit" wire:loading.attr="disabled"
                            class="bg-green-600 w-full hover:bg-green-700 items-center rounded-lg text-white p-2">SIMPAN</button>
                    </div>
                </form>
            </div>

            <div id="jabatan" x-show="jabatan" class="pt-5">
                <div class="flex flex-row p-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="switchModalGlobal({{$nip_baru}},'jabatan')"
                        class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white flex flex-row p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <div class="text-sm pl-2">TAMBAH JABATAN</div>   
                    </button>
                </div>
                <div class="h-max flex flex-row p-2">
                    <div class="col-span-12 overflow-auto lg:overflow-hidden">
                        <table class="table-fixed lg:w-full sm:w-full w-max pb-10">
                            <thead>
                                <tr
                                    class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal border-b-2 border-gray-400">
                                    <th class="py-2 px-4 text-center lg:w-3/4">Nama Jabatan</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Nomor Surat</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Tanggal Surat</th>
                                    <th class="py-2 px-4 text-center w-16">#</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse ($getRiwayatJabatan as $jabatan)
                                <tr class="hover:bg-blue-100 border-2 border-gray-100">
                                    <td class="py-3 px-4 text-left">{{$jabatan->nama_jabatan}}</td>
                                    <td class="py-3 px-4 text-center">{{$jabatan->nomor_surat_jabatan}}</td>
                                    <td class="py-3 px-4 text-center">{{$jabatan->tanggal_surat_jabatan}}</td>
                                    <td class="py-3 px-4 text-center justify-center flex">
                                        <button wire:click="showUserGlobal({{$jabatan->id}},'jabatan')"
                                            class="flex-1 mr-1 bg-blue-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-blue-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                        <button wire:click="dateUserGlobal({{$jabatan->id}},'jabatan')"
                                            onclick="confirm('Yakin anda ingin menghapus ({{$jabatan->nama_jabatan}})?') || event.stopImmediatePropagation()"
                                            class="flex-1 bg-red-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-red-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="bg-blue-100 p-5 text-2xl text-whtie">
                                        <div class="text-center font-medium uppercase">
                                            data belum ada
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="pangkat_golongan" x-show="pangkat_golongan" class="pt-5">
                <div class="flex flex-row p-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="switchModalGlobal({{$nip_baru}},'pangkat_golongan')"
                        class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white p-2 flex flex-row p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <label class="text-sm pl-2">
                            TAMBAH PANGKAT DAN GOLONGAN
                        </label>
                    </button>
                </div>
                <div class="h-max flex flex-row p-2">
                    <div class="col-span-12 overflow-auto lg:overflow-hidden">
                        <table class="table-fixed lg:w-full sm:w-full w-max pb-10">
                            <thead>
                                <tr
                                    class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal border-b-2 border-gray-400">
                                    <th class="py-2 px-4 text-center lg:w-3/4">Pangkat dan Golongan</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Nomor Surat</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Tanggal Surat</th>
                                    <th class="py-2 px-4 text-center w-16">#</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse ($getRiwayatPangkatGolongan as $pangkatGolongan)
                                <tr class="hover:bg-blue-100 border-2 border-gray-100">
                                    <td class="py-3 px-2 text-left">{{$pangkatGolongan->pangkat_golongan}}</td>
                                    <td class="py-3 px-2 text-center">{{$pangkatGolongan->nomor_surat_pangkat_golongan}}</td>
                                    <td class="py-3 px-2 text-center">{{$pangkatGolongan->tanggal_surat_pangkat_golongan}}</td>
                                    <td class="py-3 px-2 text-center justify-center flex">
                                        <button wire:click="showUserGlobal({{$pangkatGolongan->id}},'pangkat_golongan')"
                                            class="flex-1 mr-1 bg-blue-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-blue-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                        <button wire:click="dateUserGlobal({{$pangkatGolongan->id}},'pangkat_golongan')"
                                            onclick="confirm('Yakin anda ingin menghapus ({{$pangkatGolongan->pangkat_golongan}})?') || event.stopImmediatePropagation()"
                                            class="flex-1 bg-red-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-red-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="bg-blue-100 p-5 text-2xl text-whtie">
                                        <div class="text-center font-medium uppercase">
                                            data belum ada
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="pendidikan_formal" x-show="pendidikan_formal" class="pt-5">
                <div class="flex flex-row p-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="switchModalGlobal({{$nip_baru}},'pendidikan_formal')"
                        class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white p-2 flex flex-row p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <label class="text-sm pl-2">TAMBAH PENDIDIKAN FORMAL</label>
                        
                    </button>
                </div>
                <div class="h-max flex flex-row p-2">
                    <div class="col-span-12 overflow-auto lg:overflow-hidden">
                        <table class="table-fixed w-max sm:w-full lg:w-full pb-10">
                            <thead>
                                <tr
                                    class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal border-b-2 border-gray-400">
                                    <th class="py-2 px-4 text-center lg:w-3/4">Nama Sekolah</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Tingkat</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Jurusan</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Tahun Lulus</th>
                                    <th class="py-2 px-4 text-center w-16">#</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse ($getRiwayatPendidikanFormal as $pendidikanFormal)
                                <tr class="hover:bg-blue-100 border-2 border-gray-100">
                                    <td class="py-3 px-2 text-left">{{$pendidikanFormal->nama_sekolah}}</td>
                                    <td class="py-3 px-2 text-center">{{$pendidikanFormal->tingkat}}</td>
                                    <td class="py-3 px-2 text-center">{{$pendidikanFormal->jurusan}}</td>
                                    <td class="py-3 px-2 text-center">{{$pendidikanFormal->tahun_lulus}}</td>
                                    <td class="py-3 px-2 text-center justify-center flex">
                                        <button wire:click="showUserGlobal({{$pendidikanFormal->id}},'pendidikan_formal')"
                                            class="flex-1 mr-1 bg-blue-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-blue-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                        <button wire:click="dateUserGlobal({{$pendidikanFormal->id}},'pendidikan_formal')"
                                            onclick="confirm('Yakin anda ingin menghapus ({{$pendidikanFormal->nama_sekolah}})?') || event.stopImmediatePropagation()"
                                            class="flex-1 bg-red-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-red-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="bg-blue-100 p-5 text-2xl text-whtie">
                                        <div class="text-center font-medium uppercase">
                                            data belum ada
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="pendidikan_non_formal" x-show="pendidikan_non_formal" class="pt-5">
                <div class="flex flex-row p-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="switchModalGlobal({{$nip_baru}},'pendidikan_non_formal')"
                        class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white p-2 flex flex-row p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <label class="text-sm pl-2">TAMBAH PENDIDIKAN NON FORMAL</label>
                    </button>
                </div>
                <div class="h-max flex flex-row p-2">
                    <div class="col-span-12 overflow-auto lg:overflow-hidden">
                        <table class="table-fixed lg:w-full sm:w-full w-full pb-10">
                            <thead>
                                <tr
                                    class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal border-b-2 border-gray-400">
                                    <th class="py-2 px-4 text-center lg:w-3/4">Nama Pelatihan</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Tanggal Pelatihan</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Kategori</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Nomor Pelatihan</th>
                                    <th class="py-2 px-4 text-center w-16">#</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse ($getRiwayatPendidikanNonFormal as $pendidikanNonFormal)
                                <tr class="hover:bg-blue-100 border-2 border-gray-100">
                                    <td class="py-3 px-2 text-left">{{$pendidikanNonFormal->nama_diklat}}</td>
                                    <td class="py-3 px-2 text-center">
                                        @if($pendidikanNonFormal->tanggal_diklat_akhir == null)
                                        {{$pendidikanNonFormal->tanggal_diklat_awal}}
                                        @else
                                        {{$pendidikanNonFormal->tanggal_diklat_awal.' - '.$pendidikanNonFormal->tanggal_diklat_akhir}}
                                        @endif
                                    </td>
                                    <td class="py-3 px-2 text-center">{{$pendidikanNonFormal->kategori}}</td>
                                    <td class="py-3 px-2 text-center">{{$pendidikanNonFormal->nomor_surat_diklat}}</td>
                                    <td class="py-3 px-2 text-center justify-center flex">
                                        <button wire:click="showUserGlobal({{$pendidikanNonFormal->id}},'pendidikan_non_formal')"
                                            class="flex-1 mr-1 bg-blue-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-blue-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                        <button wire:click="dateUserGlobal({{$pendidikanNonFormal->id}},'pendidikan_non_formal')"
                                            onclick="confirm('Yakin anda ingin menghapus ({{$pendidikanNonFormal->nama_diklat}})?') || event.stopImmediatePropagation()"
                                            class="flex-1 bg-red-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-red-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="bg-blue-100 p-5 text-2xl text-whtie">
                                        <div class="text-center font-medium uppercase">
                                            data belum ada
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="keluarga" x-show="keluarga" class="pt-5">
                <div class="flex flex-row p-2">
                    <button type="button" wire:loading.attr="disabled"
                        wire:click="switchModalGlobal({{$nip_baru}},'keluarga')"
                        class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white p-2 flex flex-row p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <label class="text-sm pl-2">TAMBAH ANGGOTA KELUARGA</label>
                    </button>
                </div>
                <div class="h-max flex flex-row p-2">
                    <div class="col-span-12 overflow-auto lg:overflow-hidden">
                        <table class="table-fixed lg:w-full w-max sm:w-full pb-10">
                            <thead>
                                <tr
                                    class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal border-b-2 border-gray-400">
                                    <th class="py-2 px-4 text-center lg:w-3/4">Nama</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Status</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Nomor KTP</th>
                                    <th class="py-2 px-4 text-center lg:w-3/4">Pendidikan</th>
                                    <th class="py-2 px-4 text-center w-16">#</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse ($getRiwayatKeluarga as $keluarga)
                                <tr class="hover:bg-blue-100 border-2 border-gray-100">
                                    <td class="py-3 px-2 text-left">{{$keluarga->nama_keluarga}}</td>
                                    <td class="py-3 px-2 text-center">
                                        {{$keluarga->status_keluarga}}
                                    </td>
                                    <td class="py-3 px-2 text-center">{{$keluarga->nomor_ktp_keluarga}}</td>
                                    <td class="py-3 px-2 text-center">{{$keluarga->pendidikan_keluarga}}</td>
                                    <td class="py-3 px-2 text-center justify-center flex">
                                        <button wire:click="showUserGlobal({{$keluarga->id}},'keluarga')"
                                            class="flex-1 mr-1 bg-blue-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-blue-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                        <button wire:click="dateUserGlobal({{$keluarga->id}},'keluarga')"
                                            onclick="confirm('Yakin anda ingin menghapus ({{$keluarga->nama_keluarga}})?') || event.stopImmediatePropagation()"
                                            class="flex-1 bg-red-500 w-6 h-6 p-1 text-sm font-bold rounded text-white hover:bg-red-600 inline-flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 22 22" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="bg-blue-100 p-5 text-2xl text-whtie">
                                        <div class="text-center font-medium uppercase">
                                            data belum ada
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal global --}}
    <x-modal wire:model="addModalGlobal">
        @if($updatingGlobal == true)
            <form wire:submit.prevent="updateUserGlobal">
            <input type="hidden" wire:model="getID">
        @else 
            <form wire:submit.prevent="storeUserGlobal">
            <input type="hidden" wire:model="getID">
        @endif

        @if($menu == 'pendidikan_formal')
        <div class="bg-gray-300 p-2 text-center">
            <div class="lg:text-2xl text-md text-gray-800 font-medium">TAMBAH PENDIDIKAN FORMAL</div>
        </div>
        <div class="h-max flex flex-row gap-2 pt-0">
            <div class="w-full m-1 col-span-1">
                <div class="col-span-12 p-2">
                    <label class="block font-medium text-md text-gray-700">Nama Sekolah</label>
                    <input type="text" wire:model.defer="nama_sekolah" required
                        class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                </div>
                <div class="col-span-12 p-2">
                    <label class="block font-medium text-md text-gray-700">Tingkat</label>
                    <select wire:model.defer="tingkat" required
                        class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                        <option value="">-</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
                <div class="col-span-12 p-2">
                    <label class="block font-medium text-md text-gray-700">Jurusan</label>
                    <input type="text" wire:model.defer="jurusan" required
                        class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                </div>
                <div class="col-span-12 p-2">
                    <label class="block font-medium text-md text-gray-700">Tahun Lulus</label>
                    <input type="number" wire:model.defer="tahun_lulus" required
                        class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                </div>
                <div class="col-span-12 p-3">
                    <div class="flex flex-row">
                        <button type="submit" wire:loading.attr="disabled"
                            class="bg-green-600 w-full hover:bg-green-700  items-center rounded-l-lg text-white p-2">SIMPAN</button>
                        <button type="button" wire:loading.attr="disabled" wire:click="$toggle('addModalGlobal')"
                            class="bg-gray-600 hover:bg-gray-700 items-center rounded-r-lg text-white p-2">BATAL</button>
                    </div>
                </div>
            </div>
        </div>
        
        @elseif($menu == 'pendidikan_non_formal')
        <div class="bg-gray-300 p-2 text-center">
            <div class="lg:text-2xl text-md text-gray-800 font-medium">TAMBAH PENDIDIKAN NON FORMAL</div>
        </div>
        {{-- <form wire:submit.prevent="storeUserGlobal"> --}}
            <div class="h-max flex flex-row gap-2 pt-0">
                <div class="w-full m-1 col-span-1">
                    <div class="col-span-12 p-2">
                        <label class="block font-medium text-md text-gray-700">Nama Pelatihan</label>
                        <input type="text" wire:model.defer="nama_diklat" required
                            class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                    </div>
                    <div class="col-span-12 p-2">
                        <label class="block font-medium text-md text-gray-700">Tanggal Pelatihan</label>
                        <div class="flex flex-1 pt-1">
                            <input type="checkbox" value="true"
                                class="w-4 m-2 ml-0 rounded-md shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring"
                                wire:model="awal_akhir">
                            <label class="m-1 font-medium text-md text-gray-700">Pelatihan Periode</label>
                        </div>
                        @if($awal_akhir == true)
                        <div class="lg:flex lg:flex-row lg:gap-1">
                            <div class="w-full">
                                <label class="block font-medium text-md text-gray-700">Tanggal Awal</label>
                                <input type="date" wire:model.defer="tanggal_diklat_awal" @if($awal_akhir == true) required @endif
                                    class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                            <div class="w-full pt-2 lg:pt-0">
                                <label class="block font-medium text-md text-gray-700">Tanggal Akhir</label>
                                <input type="date" wire:model="tanggal_diklat_akhir" @if($awal_akhir == true) required @endif
                                    class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                        </div>
                        @else
                        <input type="date" wire:model.defer="tanggal_diklat_awal" @if($awal_akhir == null) required @endif
                            class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                        @endif
                    </div>
                    <div class="col-span-12 p-2">
                        <label class="block font-medium text-md text-gray-700">Kategori Pelatihan</label>
                        <select wire:model.defer="kategori" required
                            class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            <option value="">-</option>
                            <option value="seminar / Workshop">seminar / Workshop</option>
                        </select>
                    </div>
                    <div class="col-span-12 p-2">
                        <label class="block font-medium text-md text-gray-700">Nomor Pelatihan</label>
                        <input type="text" wire:model.defer="nomor_surat_diklat" required
                            class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                    </div>
                    <div class="col-span-12 p-2">
                        <div class="flex flex-row">
                            <button type="submit" wire:loading.attr="disabled"
                                class="bg-green-600 w-full hover:bg-green-700  items-center rounded-l-lg text-white p-2">SIMPAN</button>
                            <button type="button" wire:loading.attr="disabled" wire:click="$toggle('addModalGlobal')"
                                class="bg-gray-600 hover:bg-gray-700 items-center rounded-r-lg text-white p-2">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </form> --}}
        @elseif($menu == 'keluarga')
        <div class="bg-gray-300 p-2 text-center">
            <div class="lg:text-2xl text-md text-gray-800 font-medium">TAMBAH ANGGOTA KELUARGA</div>
        </div>
        {{-- <form wire:submit.prevent="storeUserGlobal"> --}}
            <div class="h-max flex flex-row gap-2 pt-0">
                <div class="w-full m-1 col-span-1">
                    <div class="col-span-12 p-2">
                        <label class="block font-medium text-md text-gray-700">Nama</label>
                        <input type="text" wire:model.defer="nama_keluarga" required
                            class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                    </div>
                    <div class="col-span-12 p-2">
                        <div class="lg:flex lg:flex-row lg:gap-1">
                            <div class="w-full">
                                <label class="block font-medium text-md text-gray-700">Tempat Lahir</label>
                                <input placeholder="Tempat Lahir" type="text" wire:model.defer="tempat_lahir_keluarga" required
                                class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                            <div class="w-full pt-2 lg:pt-0">
                                <label class="block font-medium text-md text-gray-700">Tanggal Lahir</label>
                                <input placeholder="Tanggal Lahir" type="date" wire:model.defer="tanggal_lahir_keluarga" required
                                    class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 p-2">
                        <label class="block font-medium text-md text-gray-700">Status Keluarga</label>
                        <select wire:model.defer="status_keluarga" required
                            class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            <option value="">-</option>
                            <option value="Istri">Suami / Istri</option>
                            <option value="Anak">Anak</option>
                        </select>
                    </div>
                    <div class="col-span-12 p-2">
                        <label class="block font-medium text-md text-gray-700">Nomor KTP</label>
                        <input type="number" wire:model.defer="nomor_ktp_keluarga" required
                            class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                    </div>
                    <div class="col-span-12 p-2">
                        <label class="block font-medium text-md text-gray-700">Pendidikan</label>
                        <select wire:model.defer="pendidikan_keluarga" required
                            class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            <option value="">-</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="col-span-12 p-2">
                        <div class="flex flex-row">
                            <button type="submit" wire:loading.attr="disabled"
                                class="bg-green-600 w-full hover:bg-green-700  items-center rounded-l-lg text-white p-2">SIMPAN</button>
                            <button type="button" wire:loading.attr="disabled" wire:click="$toggle('addModalGlobal')"
                                class="bg-gray-600 hover:bg-gray-700 items-center rounded-r-lg text-white p-2">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </form> --}}
        @elseif($menu == 'jabatan')
        <div class="bg-gray-300 p-2 text-center">
            <div class="lg:text-2xl text-md text-gray-600 font-medium">TAMBAH JABATAN</div>
        </div>
        {{-- <form wire:submit.prevent="storeUserGlobal"> --}}
            <div class="h-max flex flex-row gap-2 pt-0">
                <div class="w-full m-1 col-span-1">
                    <div class="col-span-12 p-2">
                        <label class="block font-medium text-md text-gray-700">Nama Jabatan</label>
                        <input type="text" wire:model.defer="nama_jabatan" required
                            class="rounded-md w-full shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                    </div>
                    <div class="col-span-12 pr-2 pl-2 lg:p-2 ">
                        <div class="lg:flex lg:flex-row lg:gap-1">
                            <div class="w-full">
                                <label class="block font-medium text-md text-gray-700">Nomor Surat</label>
                                <input placeholder="Nomor Surat" type="text" wire:model.defer="nomor_surat_jabatan" required
                                class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                            <div class="w-full pt-3 lg:pt-0">
                                <label class="block font-medium text-md text-gray-700">Tanggal Surat</label>
                                <input placeholder="Tanggal Lahir" type="date" wire:model.defer="tanggal_surat_jabatan" required
                                    class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 p-2">
                        <div class="flex flex-row">
                            <button type="submit" wire:loading.attr="disabled"
                                class="bg-green-600 w-full hover:bg-green-700  items-center rounded-l-lg text-white p-2">SIMPAN</button>
                            <button type="button" wire:loading.attr="disabled" wire:click="$toggle('addModalGlobal')"
                                class="bg-gray-600 hover:bg-gray-700 items-center rounded-r-lg text-white p-2">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </form> --}}
        @elseif($menu == 'pangkat_golongan')
        <div class="bg-gray-300 p-2 text-center">
            <div class="lg:text-2xl text-md text-gray-800 font-medium">TAMBAH PANGKAT DAN GOLONGAN</div>
        </div>
        {{-- <form wire:submit.prevent="storeUserGlobal"> --}}
            <div class="h-max flex flex-row gap-2 pt-0">
                <div class="w-full m-1 col-span-1">
                    <div class="col-span-12 p-2">
                        <label class="block font-medium text-md text-gray-700">Pangkat dan Golongan</label>
                        <input type="text" wire:model.defer="pangkat_golongan" required
                            class="rounded-md w-full uppercase shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                    </div>
                    <div class="col-span-12 p-2">
                        <div class="lg:flex lg:flex-row lg:gap-2">
                            <div class="w-full">
                                <label class="block font-medium text-md text-gray-700">Nomor Surat</label>
                                <input placeholder="Nomor Surat" type="text" wire:model.defer="nomor_surat_pangkat_golongan" required
                                class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                            <div class="w-full pt-3 lg:pt-0">
                                <label class="block font-medium text-md text-gray-700">Tanggal Surat</label>
                                <input placeholder="Tanggal Lahir" type="date" wire:model.defer="tanggal_surat_pangkat_golongan" required
                                    class="w-full rounded-lg shadow-sm hover:bg-blue-50 focus:ring-opacity-50 focus:ring-blue-300 border-gray-200 focus:ring">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 p-3">
                        <div class="flex flex-row">
                            <button type="submit" wire:loading.attr="disabled"
                                class="bg-green-600 w-full hover:bg-green-700  items-center rounded-l-lg text-white p-2">SIMPAN</button>
                            <button type="button" wire:loading.attr="disabled" wire:click="$toggle('addModalGlobal')"
                                class="bg-gray-600 hover:bg-gray-700 items-center rounded-r-lg text-white p-2">BATAL</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </form>
    </x-modal>
</div>

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.0.7/compressor.min.js"></script>
<script>
    document.addEventListener('livewire:load', function () {
        @this.on('PictureId', () => {
            let pictureID = document.getElementById('picture_id');
            let pictureFile = pictureID.files[0];
            let compressPicture = new Compressor(pictureFile, {
                quality: 0.5,
                maxWidth: 1000,
                maxHeight: 1000,
                success(res) {
                    let renderFile = new FileReader();
                    renderFile.readAsDataURL(res);
                    renderFile.onloadend = () => {
                        @this.set('picture', renderFile.result)
                    };
                },
                error(resErr) {
                    console.log(resErr.message);
                }
            });
            //pictureID.value = null;
        });
    });

</script>
@endpush
