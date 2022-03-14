<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function check(Request $req)
    {
        $req->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('login', '=', $req->login)->first();

        if(Hash::check($req->password, $user->password))
        {
            if(empty($user))
            {
                return redirect()->back()->with('xabar', 'Login yoki parol xato');
            }
            if($user->status=='1')
            {
               Session::put('admin', $user->id);
               return redirect('admin');

            }

            elseif($user->status=='2')
            {
                Session::put('user', $user->id);
                return redirect('user');
            }

        }

    }

    public function adduser(Request $add)
    {
       
        
        $add ->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'pass' => 'required',
            'pass1' => 'required',
            'login' => 'required',
            'email' => 'required',
            'phone' => 'required',
            
        ]);

        $check = User::where('login', '=', $add->login)->first();
        $check2 = User::where('email', '=', $add->email)->first();
        
        if(!empty($check2))
        {
            return redirect()->back()->with('error', 'Email avvl ishlatilgan');
        }

        if(empty($check))
        {
            if($add->pass==$add->pass1)
            {
                $user = new User;
                $user->status='2';
                $user->lastname = $add->lastname;
                $user->firstname = $add->firstname;
                $user->login = $add->login;
                $user->password = Hash::make($add->pass);
                $user->phone = $add->phone;
                $user->email = $add->email;
                $user->save();
            }
            else
            {
                return redirect()->back()->with('error', 'Parol bir xil emas');
            }

        }

        else
        {
            return redirect()->back()->with('error', 'Login avval ishlatilgan');
        }

        if($user)
        {
            return redirect('/login')->with('xabar', 'Hammasi OK');
        }
        else
        {
            return redirect()->back()->with('error', 'Xatolik yuz berdi');
        }

    }

    public function getlogin(Request $req) 
    { 
        $login=User::where('login','=',$req->log)->first();  
        
        if(empty($login))
        {
            $data = "Login Band qilinmagan";
        }
        else
        {
            $data = "O'zgartiring";
        }
        return response()->json($data); 
    }
}
