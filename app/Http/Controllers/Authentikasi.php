<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Customer;
use App\Produk;
use App\User;
use Laravolt\Indonesia\Facade;
use Auth;

class Authentikasi extends Controller
{     
    public function logout(){        
        Session::flush();
        Auth::logout();       
        return redirect('login')->with('alert','anda sudah logout!');
    }
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $data = Customer::where('email',$email)->first();
        if(count($data) > 0){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('login',TRUE);                
                return redirect('/');               
            }
            else{
                return redirect('login')->with('alert','Password atau Email, Salah !'.Hash::check($password,$data->password));
            }
        }
        else{
            return redirect('login')->with('alert','Password atau Email, Salahaa!');
        }
    }

    public function showLoginForm(){

        if(Session::get('login')){
           return redirect('/')->with('alert','anda sudah login');
        }else{           
                return view('auth.login');
            }                   
    }

    public function showRegistrationForm(){
        $provinsi = Facade::allProvinces(); 
        $kabupaten = Facade::paginateCities($numRows = 514);
        $kecamatan = Facade::paginateDistricts($numRows = 2093);
        $desa = Facade::paginateVillages($numRows = 5043);        
        return view('auth.register', ['provinsi'=>$provinsi, 'kabupaten'=>$kabupaten,'kecamatan'=>$kecamatan, 'desa'=>$desa]);
    }

        

    protected function create(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'nohp' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'kodepos' => 'required',
        ]);
        
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);        
        $data->nohp = $request->nohp;
        $data->provinsi = $request->provinsi;
        $data->kabupaten = $request->kabupaten;
        $data->kecamatan = $request->kecamatan;
        $data->desa = $request->desa;
        $data->kodepos = $request->kodepos;
        $data->save();        
        return redirect('login')->with('alert-success','anda berhasil registrasi');
    }
}