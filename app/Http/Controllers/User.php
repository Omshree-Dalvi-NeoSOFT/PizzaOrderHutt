<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class User extends Controller
{
    public function postsignup(Request $req){
        $validateData = $req->validate([
            'name'=>'required|min:2|max:20',
            'email'=>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'pass'=>'required|regex:/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/',
            'mobile'=>'required|integer|min:10',
            'address'=>'required|min:5'
        ],[
            'pass.required'=>"Password is required",
            'pass.regex'=>"Password must contain atleast one symbole, one capital letter, one integer and Maximum length must be 8 character"
        ]);
        if($validateData){
            $regis = new Register();
            $regis->name=$req->name;
            $regis->email=$req->email;
            $regis->password=Hash::make($req->pass);
            $regis->mobile=$req->mobile;
            $regis->address=$req->address;
            if($regis->save()){
                return back()->with('success',"user registered Successfully !!");
            }
            else{
                return back()->with('errorMsg',"user registered Fail !! ");
            }
        }
    }

    public function postlogin(Request $req){
        $validateData=$req->validate([
            'email'=>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'pass'=>'required'
        ],[
            'pass.required'=>"Password is required !"
        ]);
        if($validateData){
            $validatedata=$req->validate([
                'email'=>'required',
                'pass'=>'required'
            ]);
            if($validatedata){
                $email = $req->email;
                $user = Register::where('email', $email)->first();
                if(!$user){
                    return back()->with('errorMsg', "User doesn't exist");
                }
                else{
                    if(Hash::check($req->pass,$user->password)){
                        //Session(['uname'=> $user->uname]);
                        $req->session()->put('user',$user);
                        return redirect('layout/dashboard');
                    }
                    else{
                        return back()->with('errorMsg', 'Login error');
                    }
    
                }
            }
        }
    }

    public function logout(){
        session()->forget('orderid');
        session()->forget('user');
        return view('welcome');
    }

    public function myProfile(){
        $de=session('user');
        $uid=$de->id;
        $details=Register::where('id',$uid)->first();
        return view('layout.myprofile',['details'=>$details]);
    }

    public function myProfileEdit(){
        $user=session('user');
        $uid=$user->id;
        $details=Register::where('id',$uid)->first();
        return view('layout/editprofile',['detail'=>$details]);
    }

    public function postmyProfileEdit(Request $req){
        $validateData=$req->validate([
            'name'=>'required|min:2|max:20',
            'email'=>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'mobile'=>'required|integer|min:10',
            'address'=>'required|min:5'
        ]);
        if($validateData){
            $id=$req->id;
            $user=Register::whereId($id)->update([
                'email' => $req->email,
                'name' => $req->name, 
                'mobile' => $req->mobile,
                'address' => $req->address, 
            ]);
            //$this->myProfile();
            return redirect('layout/myprofile');
        }
    }
}
