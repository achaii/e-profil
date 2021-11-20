<?php

namespace App\Http\Livewire;

use Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Profil extends Component
{
    //config modal
    public $menu;
    public $awal_akhir;
    public $updatingGlobal = false;
    public $addModalGlobal = false;
    public $getID;

    //profil
    public $authUser;
    public $nama;
    public $nip_baru;
    public $nip_lama;
    public $jenis_kelamin;
    public $alamat;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $nomor_npwp;
    public $tanggal_npwp;
    public $nomor_bpjs;
    public $tanggal_bpjs;
    public $nomor_ktp;
    public $jabatan;
    public $unit_kerja;
    public $sub_unit_kerja;
    public $picture;
    
    //modal pendidikan formal
    public $nama_sekolah;
    public $tingkat;
    public $tahun_lulus;
    public $jurusan;

    //modal pendidikan non formal
    public $nama_diklat;
    public $tanggal_diklat_awal;
    public $tanggal_diklat_akhir;
    public $kategori;
    public $nomor_surat_diklat;

    //modal keluarga
    public $nama_keluarga;
    public $tempat_lahir_keluarga;
    public $tanggal_lahir_keluarga;
    public $status_keluarga;
    public $nomor_ktp_keluarga;
    public $pendidikan_keluarga;

    //modal jabatan
    public $nama_jabatan;
    public $nomor_surat_jabatan;
    public $tanggal_surat_jabatan;

    //modal pangkat dan golongan
    public $pangkat_golongan;
    public $tanggal_surat_pangkat_golongan;
    public $nomor_surat_pangkat_golongan;

    public function mount(){
        if(Auth::user()->access == 'admin'){
            $this->authUser = Session::get('id');
        }elseif(Auth::user()->access == 'user'){
            $this->authUser = Auth::user()->id;
        }
        
        $getUsersByID = DB::table('users')->where('id',$this->authUser)->first();

        $this->nama = $getUsersByID->nama;
        $this->nip_baru = $getUsersByID->nip_baru;
        $this->nip_lama = $getUsersByID->nip_lama;
        $this->jenis_kelamin = $getUsersByID->jenis_kelamin;
        $this->alamat = $getUsersByID->alamat;
        $this->nomor_npwp = $getUsersByID->nomor_npwp;
        $this->nomor_bpjs = $getUsersByID->nomor_bpjs;
        $this->nomor_ktp = $getUsersByID->nomor_ktp;
        $this->jabatan = $getUsersByID->jabatan;
        $this->unit_kerja = $getUsersByID->unit_kerja;
        $this->sub_unit_kerja = $getUsersByID->sub_unit_kerja;
        $this->tempat_lahir = $getUsersByID->tempat_lahir;
        $this->picture = $getUsersByID->picture;
        $this->tanggal_npwp = substr($getUsersByID->tanggal_npwp,0,4).'-'.substr($getUsersByID->tanggal_npwp,4,2).'-'.substr($getUsersByID->tanggal_npwp,6,2);
        $this->tanggal_bpjs = substr($getUsersByID->tanggal_bpjs,0,4).'-'.substr($getUsersByID->tanggal_bpjs,4,2).'-'.substr($getUsersByID->tanggal_bpjs,6,2);
        $this->tanggal_lahir = substr($getUsersByID->tanggal_lahir,0,4).'-'.substr($getUsersByID->tanggal_lahir,4,2).'-'.substr($getUsersByID->tanggal_lahir,6,2);
    }

    public function render(){
        return view('livewire.profil',[
            'getRiwayatPendidikanFormal' => DB::table('riwayat_pendidikan_formal')->where('nip_baru',$this->nip_baru)->get(),
            'getRiwayatPendidikanNonFormal' => DB::table('riwayat_pendidikan_non_formal')->where('nip_baru',$this->nip_baru)->get(),
            'getRiwayatKeluarga' => DB::table('riwayat_keluarga')->where('nip_baru',$this->nip_baru)->get(),
            'getRiwayatJabatan' => DB::table('riwayat_jabatan')->where('nip_baru',$this->nip_baru)->get(),
            'getRiwayatPangkatGolongan' => DB::table('riwayat_pangkat_golongan')->where('nip_baru',$this->nip_baru)->get(),
            'getJabatan' => DB::table('jabatan')->get(),
            'getUnitKerja' => DB::table('unit_kerja')->where('kategori_unit_kerja','unit')->get(),
            'getSubUnitKerja' => DB::table('unit_kerja')->where('kategori_unit_kerja','sub unit')->where('id_unit_kerja',$this->unit_kerja)->get()
        ]);
    }

    public function switchModalGlobal($nip,$menu){
        $this->menu = $menu;
        $this->addModalGlobal = true;
    }

    public function storeUser(){
        DB::table('users')
        ->where('id',$this->authUser)
        ->update([
            'nama' => $this->nama, 
            'nip_baru' => $this->nip_baru, 
            'nip_lama' => $this->nip_lama, 
            'jenis_kelamin' => $this->jenis_kelamin, 
            'alamat' => $this->alamat, 
            'tempat_lahir' => $this->tempat_lahir, 
            'tanggal_lahir' => str_replace('-','',$this->tanggal_lahir), 
            'nomor_npwp' => $this->nomor_npwp, 
            'tanggal_npwp' => str_replace('-','',$this->tanggal_npwp), 
            'nomor_bpjs' => $this->nomor_bpjs, 
            'tanggal_bpjs' => str_replace('-','',$this->tanggal_bpjs), 
            'nomor_ktp' => $this->nomor_ktp, 
            'jabatan' => $this->jabatan, 
            'unit_kerja' => $this->unit_kerja, 
            'sub_unit_kerja' => $this->sub_unit_kerja,
            'picture' => $this->picture,
            'updated_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
        ]);
    }

    public function storeUserGlobal(){
        if($this->menu == 'pendidikan_formal'){
            DB::table('riwayat_pendidikan_formal')
            ->insert([
                'nip_baru' => $this->nip_baru,  
                'nama_sekolah' => $this->nama_sekolah,
                'tingkat' => $this->tingkat,
                'tahun_lulus' => $this->tahun_lulus,
                'jurusan' => $this->jurusan,
                'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
            ]);
        }elseif($this->menu == 'pendidikan_non_formal'){
            DB::table('riwayat_pendidikan_non_formal')
            ->insert([
                'nip_baru' => $this->nip_baru,
                'nama_diklat' => $this->nama_diklat,
                'tanggal_diklat_awal' => $this->tanggal_diklat_awal,
                'tanggal_diklat_akhir' => $this->tanggal_diklat_akhir,
                'kategori' => $this->kategori,
                'nomor_surat_diklat' => $this->nomor_surat_diklat,
                'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
            ]);
        }elseif($this->menu == 'keluarga'){
            DB::table('riwayat_keluarga')
            ->insert([
                'nip_baru' => $this->nip_baru,
                'nama_keluarga' => $this->nama_keluarga,
                'tempat_lahir_keluarga' => $this->tempat_lahir_keluarga,
                'tanggal_lahir_keluarga' => $this->tanggal_lahir_keluarga,
                'status_keluarga' => $this->status_keluarga,
                'nomor_ktp_keluarga' => $this->nomor_ktp_keluarga,
                'pendidikan_keluarga' => $this->pendidikan_keluarga,
                'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
            ]);
        }elseif($this->menu == 'jabatan'){
            DB::table('riwayat_jabatan')
            ->insert([
                'nip_baru' => $this->nip_baru,
                'nama_jabatan' => $this->nama_jabatan,
                'nomor_surat_jabatan' => $this->nomor_surat_jabatan,
                'tanggal_surat_jabatan' => $this->tanggal_surat_jabatan,
                'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
            ]);
        }elseif($this->menu == 'pangkat_golongan'){
            DB::table('riwayat_pangkat_golongan')
            ->insert([
                'nip_baru' => $this->nip_baru,
                'pangkat_golongan' => strtoupper($this->pangkat_golongan),
                'tanggal_surat_pangkat_golongan' => $this->tanggal_surat_pangkat_golongan,
                'nomor_surat_pangkat_golongan' => $this->nomor_surat_pangkat_golongan,
                'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

        $this->addModalGlobal = false;
    }

    public function showUserGlobal($id,$menu){
        $this->menu = $menu;
        if($this->menu == 'pendidikan_formal'){
            $getData = DB::table('riwayat_pendidikan_formal')->where('id',$id)->first();

            //pendidikan formal
            $this->getID = $getData->id;
            $this->nama_sekolah = $getData->nama_sekolah;
            $this->tingkat = $getData->tingkat;
            $this->tahun_lulus = $getData->tahun_lulus;
            $this->jurusan = $getData->jurusan;
        }elseif($this->menu == 'pendidikan_non_formal'){
            $getData = DB::table('riwayat_pendidikan_non_formal')->where('id',$id)->first();

            //pendidikan non formal
            $this->getID = $getData->id;
            $this->nama_diklat = $getData->nama_diklat;
            $this->tanggal_diklat_awal = $getData->tanggal_diklat_awal;
            $this->tanggal_diklat_akhir = $getData->tanggal_diklat_akhir;
            $this->kategori = $getData->kategori;
            $this->nomor_surat_diklat = $getData->nomor_surat_diklat;

        }elseif($this->menu == 'keluarga'){
            $getData = DB::table('riwayat_keluarga')->where('id',$id)->first();
            
            //keluarga
            $this->getID = $getData->id;
            $this->nama_keluarga = $getData->nama_keluarga;
            $this->tempat_lahir_keluarga = $getData->tempat_lahir_keluarga;
            $this->tanggal_lahir_keluarga = $getData->tanggal_lahir_keluarga;
            $this->status_keluarga = $getData->status_keluarga;
            $this->nomor_ktp_keluarga = $getData->nomor_ktp_keluarga;
            $this->pendidikan_keluarga = $getData->pendidikan_keluarga;
        }elseif($this->menu == 'jabatan'){
            $getData = DB::table('riwayat_jabatan')->where('id',$id)->first();

            //jabatan
            $this->getID = $getData->id;
            $this->nama_jabatan = $getData->nama_jabatan;
            $this->nomor_surat_jabatan = $getData->nomor_surat_jabatan;
            $this->tanggal_surat_jabatan = $getData->tanggal_surat_jabatan;
        }elseif($this->menu == 'pangkat_golongan'){
            $getData = DB::table('riwayat_pangkat_golongan')->where('id',$id)->first();

            //pangkat dan golongan
            $this->getID = $getData->id;
            $this->pangkat_golongan = $getData->pangkat_golongan;
            $this->tanggal_surat_pangkat_golongan = $getData->tanggal_surat_pangkat_golongan;
            $this->nomor_surat_pangkat_golongan = $getData->nomor_surat_pangkat_golongan;
        }

        $this->addModalGlobal = true;
        $this->updatingGlobal = true;
    }

    public function updateUserGlobal(){
        if($this->menu == 'pendidikan_formal'){
            DB::table('riwayat_pendidikan_formal')
            ->where('id',$this->getID)
            ->update([
                'nip_baru' => $this->nip_baru,  
                'nama_sekolah' => $this->nama_sekolah,
                'tingkat' => $this->tingkat,
                'tahun_lulus' => $this->tahun_lulus,
                'jurusan' => $this->jurusan,
                'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
            ]);
        }elseif($this->menu == 'pendidikan_non_formal'){
            DB::table('riwayat_pendidikan_non_formal')
            ->where('id',$this->getID)
            ->update([
                'nip_baru' => $this->nip_baru,
                'nama_diklat' => $this->nama_diklat,
                'tanggal_diklat_awal' => $this->tanggal_diklat_awal,
                'tanggal_diklat_akhir' => $this->tanggal_diklat_akhir,
                'kategori' => $this->kategori,
                'nomor_surat_diklat' => $this->nomor_surat_diklat,
                'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
            ]);
        }elseif($this->menu == 'keluarga'){
            DB::table('riwayat_keluarga')
            ->where('id',$this->getID)
            ->update([
                'nip_baru' => $this->nip_baru,
                'nama_keluarga' => $this->nama_keluarga,
                'tempat_lahir_keluarga' => $this->tempat_lahir_keluarga,
                'tanggal_lahir_keluarga' => $this->tanggal_lahir_keluarga,
                'status_keluarga' => $this->status_keluarga,
                'nomor_ktp_keluarga' => $this->nomor_ktp_keluarga,
                'pendidikan_keluarga' => $this->pendidikan_keluarga,
                'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
            ]);
        }elseif($this->menu == 'jabatan'){
            DB::table('riwayat_jabatan')
            ->where('id',$this->getID)
            ->update([
                'nip_baru' => $this->nip_baru,
                'nama_jabatan' => $this->nama_jabatan,
                'nomor_surat_jabatan' => $this->nomor_surat_jabatan,
                'tanggal_surat_jabatan' => $this->tanggal_surat_jabatan,
                'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
            ]);
        }elseif($this->menu == 'pangkat_golongan'){
            DB::table('riwayat_pangkat_golongan')
            ->where('id',$this->getID)
            ->update([
                'nip_baru' => $this->nip_baru,
                'pangkat_golongan' => strtoupper($this->pangkat_golongan),
                'tanggal_surat_pangkat_golongan' => $this->tanggal_surat_pangkat_golongan,
                'nomor_surat_pangkat_golongan' => $this->nomor_surat_pangkat_golongan,
                'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

        $this->addModalGlobal = false;
        $this->updatingGlobal = false;
    }

    public function dateUserGlobal($id,$menu){
        if($menu == 'pendidikan_formal'){
            DB::table('riwayat_pendidikan_formal')->where('id',$id)->delete();
        }elseif($menu == 'pendidikan_non_formal'){
            DB::table('riwayat_pendidikan_non_formal')->where('id',$id)->delete();
        }elseif($menu == 'keluarga'){
            DB::table('riwayat_keluarga')->where('id',$id)->delete();
        }elseif($menu == 'jabatan'){
            DB::table('riwayat_jabatan')->where('id',$id)->delete();
        }elseif($menu == 'pangkat_golongan'){
            DB::table('riwayat_pangkat_golongan')->where('id',$id)->delete();
        }
    }
}
