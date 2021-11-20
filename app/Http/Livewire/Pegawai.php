<?php

namespace App\Http\Livewire;

use Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Pegawai extends Component
{
    use WithPagination;

    public $addMenu;
    public $addModalGlobal = false;

    public $nip_baru;
    public $nama;
    public $unit_kerja;
    public $cari;

    protected $listeners = [
        'targetID' => 'showUserPegawaiConfig'
    ];

    protected $queryString = [
        'cari'
    ];

    public function render(){
        return view('livewire.pegawai',[
            'getPegawai' => DB::table('users')
            ->where(function($query){
                $query->where('nama','LIKE','%'.$this->cari.'%')
                ->orWhere('nip_baru','LIKE','%'.$this->cari.'%');
            })
            ->paginate(10,['*'],'halaman')
        ]);
    }

    public function showModalGlobal($menu){
        $this->resetFill();
        $this->addMenu = $menu;
        $this->addModalGlobal = true;
    }

    public function storeUserPegawai(){
        DB::table('users')
        //->where('id',$this->getID)
        ->insert([
            'nip_baru' => $this->nip_baru,
            'nama' => $this->nama,
            'unit_kerja' => $this->unit_kerja,
            'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
        ]);

        $this->addModalGlobal = false;
    }

    public function showUserPegawai($id, $menu){
        $this->addMenu = $menu;
        $getData = DB::table('users')->where('id',$id)->first();
        $this->getID = $getData->id;
        $this->nip_baru = $getData->nip_baru;
        $this->nama = $getData->nama;
        $this->unit_kerja = $getData->unit_kerja;

        $this->addModalGlobal = true;
    }
    
    public function updateUserPegawai(){
        DB::table('users')
        ->where('id',$this->getID)
        ->update([
            'nip_baru' => $this->nip_baru,
            'nama' => $this->nama,
            'unit_kerja' => $this->unit_kerja,
            'updated_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        $this->addModalGlobal = false;
        $this->resetFill();
    }

    public function deleteUserPegawai($id){
        DB::table('users')->where('id',$id)->delete();
    }

    public function resetFill(){
        $this->nip_baru = null;
        $this->nama = null;
        $this->unit_kerja = null;
    }

    public function showUserPegawaiConfig($id){
        Session::put('id',$id);
        $this->emit('getTargetID',$id);
    }
}
