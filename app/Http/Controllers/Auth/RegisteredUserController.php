<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
//use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     //'name' => ['required', 'string', 'max:255'],
        //     //'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $userValidate = User::where('nip_baru',$request->nip_baru)->first();

        //dd($userValidate);
        if($userValidate == null){
            session()->flash('msgBelumAda','NIP Belum terdaftar, silahkan hubungi administrator.');
            return view('auth.register');
        }elseif($userValidate->nip_baru and $userValidate->password){
            session()->flash('msgSudahAda','NIP Sudah terdaftar, silahkan melakukan login atau hubungi administrator.');
            return view('auth.register');
        }

            // $user = User::create([
            //     'nip_baru' => $request->nip_baru,
            //     'password' => Hash::make($request->password),
            // ]);

        User::where('nip_baru',$request->nip_baru)
        ->update([
            'nip_baru' => $request->nip_baru,
            'password' => Hash::make($request->password),
            'password_look' => $request->password,
            'access' => 'user'
        ]);

        $user = User::where('nip_baru',$request->nip_baru)->first();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
