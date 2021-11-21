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
    public $sub_unit_kerja;
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
            ->join('unit_kerja as unit_kerjaa','unit_kerjaa.id','=','users.unit_kerja')
            ->join('unit_kerja as unit_kerjab','unit_kerjab.id','=','users.sub_unit_kerja')
            ->select(
                'users.*',
                'unit_kerjaa.unit_kerja as unita',
                'unit_kerjab.unit_kerja as unitb', 
            )
            ->where(function($query){
               $query->where('nama','LIKE','%'.$this->cari.'%')
               ->orWhere('nip_baru','LIKE','%'.$this->cari.'%')
               ->orWhere('unit_kerjaa.unit_kerja','LIKE','%'.$this->cari.'%')
               ->orWhere('unit_kerjab.unit_kerja','LIKE','%'.$this->cari.'%');
            })
            ->paginate(10,['*'],'halaman'),
            'getUnitKerja' => DB::table('unit_kerja')->where('kategori_unit_kerja','unit')->get(),
            'getSubUnitKerja' => DB::table('unit_kerja')->where('kategori_unit_kerja','sub unit')->where('id_unit_kerja',$this->unit_kerja)->get()
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
            'sub_unit_kerja' => $this->sub_unit_kerja,
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
        $this->sub_unit_kerja = $getData->sub_unit_kerja;

        $this->addModalGlobal = true;
    }
    
    public function updateUserPegawai(){
        DB::table('users')
        ->where('id',$this->getID)
        ->update([
            'nip_baru' => $this->nip_baru,
            'nama' => $this->nama,
            'unit_kerja' => $this->unit_kerja,
            'sub_unit_kerja' => $this->sub_unit_kerja,
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
        $this->sub_unit_kerja = null;
    }

    public function showUserPegawaiConfig($id){
        Session::put('id',$id);
        $this->emit('getTargetID',$id);
    }
}
