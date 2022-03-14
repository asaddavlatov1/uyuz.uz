<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminusController extends Controller
{
    public  function  userindex()
    { 
        $bilish = User::find(Session::get('admin'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }
    
        $users = User::all();
        

        return  view('admin.user.index') ->with(['users' => $users]);
    }

     public function check()
    {
        $bilish=User::find(Session::get('admin'));
        if(empty($bilish)) 
        { 
            return 0; 
        }

        if($bilish->status != '1') 
        { 
           return 0; 
        }

        return 1;
    }

    public  function  delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $user = User::find($request->id);
        $user->delete();
        return  redirect()->back();
    }
}
