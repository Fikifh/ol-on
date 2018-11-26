<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Customer;
use App\Produk;
use App\User;

class Authentikasi extends Controller
{     
    public function logout(){        
        Session::flush();
       
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
                return redirect('home');
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

        

    protected function create(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'nohp' => 'required',
            'alamat' => 'required',
            'kodepos' => 'required',
        ]);
        
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);        
        $data->nohp = $request->nohp;
        $data->alamat = $request->alamat;
        $data->kodepos = $request->kodepos;
        $data->save();
        
        return redirect('login')->with('alert-success','anda berhasil registrasi');
    }
}