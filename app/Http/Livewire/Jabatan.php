<?php

namespace App\Http\Livewire;

use Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Jabatan extends Component
{
    use WithPagination;

    public $addMenu;
    public $addModalGlobal = false;
    public $nama_jabatan;
    public $cari;

    protected $queryString = [
        'cari'
    ];

    public function render()
    {
        return view('livewire.jabatan',[
            'getJabatan' => DB::table('jabatan')
            ->where('nama_jabatan','LIKE','%'.$this->cari.'%')
            ->paginate(10,['*'],'halaman')
        ]);
    }

    public function showModalGlobal($menu){
        $this->addMenu = $menu;
        $this->addModalGlobal = true;
        $this->nama_jabatan = null;
    }

    public function storeJabatan(){
        DB::table('jabatan')
        ->insert([
            'nama_jabatan' => $this->nama_jabatan
        ]);

        $this->addModalGlobal = false;
    }

    public function showJabatan($id, $menu){
        $this->menu = $menu;
        $getData = DB::table('jabatan')->where('id',$id)->first();
        $this->nama_jabatan = $getData->nama_jabatan;

        $this->addModalGlobal = true;
    }

    public function updatEJabatan(){
        DB::table('jabatan')
        ->where('id',$this->getID)
        ->update([
            'nama_jabatan' => $this->nama_jabatan
        ]);

        $this->addModalGlobal = false;
    }

    public function deleteJabatan($id){
        DB::table('jabatan')->where('id',$id)->delete();
    }

}
