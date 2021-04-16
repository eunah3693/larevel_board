<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Login;

class Login_con extends Controller
{
    public function index()
    {
        return view('create_acc');
    }
    public function create(Request $r)
    {
        $name=$r->uname;
        $email=$r->uemail;
        $pass=$r->u_pass;

        $login= new Login;
        $login->name=$name;
        $login->email=$email;
        $login->pass=$pass;

        $created=$login->save();
        if($created){
            return redirect('/login')->with('msg','계정이 만들어졌습니다');
        }

    }
    public function login()
    {
        return view('login');
    }

    public function check_user(Request $r)
    {
        $email=$r->uemail;
        $password=$r->u_pass;

        $session =  DB::table('login')->where('email',$email)->where('pass',$password)->first();
        if($session){
            $r->session()->put('user_id',$session->id);
            $r->session()->put('user_name',$session->name);
            //dd($session[0]->name);
            return redirect('/welcome');
        }else{
            return redirect('/login')->with('msg','로그인 실패하였습니다');
        }


    }

    public function protect(Request $r)
    {
        if($r->session()->get('user_id')=="")
        {
            return redirect('/login');
        }else{
            $username=$r->session()->get('user_name');
            //dd($username);
            $capsule=array('username' => $username);
            
            return view('protect')->with($capsule);
        }
    }

    public function logout(Request $r)
    {
        $r->session()->forget('user_id');
        $r->session()->forget('user_name');

        return redirect('/home');
    }
}
