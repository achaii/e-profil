<?php

namespace App\Http\Livewire;

use Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserAccount extends Component
{
    public $authUserId;
    public $getID;
    public $nama;
    public $nip_baru;
    public $email;
    public $password;
    public $password_look;
    public $newPassword;
    public $retypePassword;
    public $picture;
    public $color = 'gray';

    public function mount(){
        $this->authUserID = Auth::user()->id;
        $this->getUser();
    }

    public function render()
    {
        return view('livewire.user-account');
    }

    public function storeProfil(){
        DB::table('users')
        ->where('id',$this->authUserID)
        ->update([
            'nama' => $this->nama,
            'nip_baru' => $this->nip_baru,
            'email' => $this->email,
        ]);

        $this->getUser();
    }

    public function storePassword(){
        if($this->password == $this->password_look){
            DB::table('users')
            ->where('id',$this->getID)
            ->update([
                'password' => bcrypt($this->newPassword),
                'password_look' => $this->newPassword
            ]);

            $this->password_look = null;
            $this->newPassword = null;
            $this->retypePassword = null;
            $this->getUser();
            $this->color = 'gray';
        }else{
            $this->color = 'red';
        }
    }

    public function getUser(){
        $getData = DB::table('users')->where('id',$this->authUserID)->first();

        $this->getID = $getData->id;
        $this->nama = $getData->nama;
        $this->nip_baru = $getData->nip_baru;
        $this->email = $getData->email;
        $this->password = $getData->password_look;
        $this->picture = $getData->picture;
    }
}
