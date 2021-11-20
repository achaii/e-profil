<?php

namespace App\Http\Livewire;

use Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UnitKerja extends Component
{
    use WithPagination;

    public $addMenu;
    public $addModalGlobal = false;
    public $stateUnitKerja = false;

    public $getID;
    public $unit_kerja;
    public $kategori_unit_kerja;
    public $id_unit_kerja;
    public $cari;
    protected $queryString = ['cari'];
    public function render()
    {
        $getUnitKerja = DB::table('unit_kerja')
        ->where(function($query){
            $query->where('unit_kerja','LIKE','%'.$this->cari.'%')
            ->orWhere('kategori_unit_kerja','LIKE','%'.$this->cari.'%');
        })
        ->orderBy('id_sort','asc')
        ->paginate(10,['*'],'halaman');

        $getUnitKerjaID = DB::table('unit_kerja')->where('kategori_unit_kerja','unit')->get();

        return view('livewire.unit-kerja',[
            'getUnitKerja' => $getUnitKerja,
            'getUnitKerjaID' => $getUnitKerjaID,
        ]);
    }

    public function showModalGlobal($menu){
        $this->addMenu = $menu;
        $this->addModalGlobal = true;
    }
    
    public function storeUnitKerja(){
        if($this->kategori_unit_kerja == 'unit'){
            $sort = DB::table('unit_kerja')->orderBy('id','desc')->first();
            if($sort){
                $urut = $sort->id + 1;
            }else{
                $urut = 1;
            }

            $sortID = $urut.sprintf('%02s',DB::table('unit_kerja')->where('id',$urut)->count());
            DB::table('unit_kerja')
            ->insert([
                'unit_kerja' => $this->unit_kerja,
                'kategori_unit_kerja' => $this->kategori_unit_kerja,
                'id_unit_kerja' => $this->id_unit_kerja,
                'id_sort' => $sortID
            ]);
        }elseif($this->kategori_unit_kerja == 'sub unit'){
            $getCount = DB::table('unit_kerja')
            ->where('id_unit_kerja',$this->id_unit_kerja)
            ->count();
            $sortID = $this->id_unit_kerja.sprintf('%02s',$getCount + 1);

            DB::table('unit_kerja')
            ->insert([
                'unit_kerja' => $this->unit_kerja,
                'kategori_unit_kerja' => $this->kategori_unit_kerja,
                'id_unit_kerja' => $this->id_unit_kerja,
                'id_sort' => $sortID
            ]);
        }

        $this->addModalGlobal = false;
    }

    public function showUnitKerja($id,$menu){
        $this->addMenu = $menu;
        $getData = DB::table('unit_kerja')->where('id',$id)->first();

        $this->getID = $getData->id;
        $this->unit_kerja = $getData->unit_kerja;
        $this->kategori_unit_kerja = $getData->kategori_unit_kerja;
        $this->id_unit_kerja = $getData->id_unit_kerja;

        $this->addModalGlobal = true;
    }

    public function updateUnitKerja(){
        if($this->kategori_unit_kerja == 'unit'){
            DB::table('unit_kerja')
            ->where('id',$this->getID)
            ->update([
                'unit_kerja' => $this->unit_kerja,
                'kategori_unit_kerja' => $this->kategori_unit_kerja,
                'id_unit_kerja' => $this->id_unit_kerja,
            ]);
        }elseif($this->kategori_unit_kerja == 'sub unit'){
            $getCount = DB::table('unit_kerja')
            ->where('id_unit_kerja',$this->id_unit_kerja)
            ->count();
            $sortID = $this->id_unit_kerja.sprintf('%02s',$getCount + 1);

            DB::table('unit_kerja')
            ->where('id',$this->getID)
            ->update([
                'unit_kerja' => $this->unit_kerja,
                'kategori_unit_kerja' => $this->kategori_unit_kerja,
                'id_unit_kerja' => $this->id_unit_kerja,
                'id_sort' => $sortID
            ]);
        }

        $this->addModalGlobal = false;
    }

    public function deleteUnitKerja($id){
        DB::table('unit_kerja')->where('id',$id)->delete();
    }

}
