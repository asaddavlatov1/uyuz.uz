<?php

namespace App\Http\Controllers;

use App\Models\comfort;
use App\Models\district;
use App\Models\flat;
use App\Models\flat_type;
use App\Models\nearby;
use App\Models\payment_type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use App\Models\region;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;

class FlatController extends Controller
{
    public function flat()
    {
        $bilish = User::find(Session::get('admin'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }
        $flats= flat_type::all();
        
        return view('admin.flat')->with(['flats' => $flats]);
    }

    public function flatcode(Request $req)
    {

        
        $req ->validate([
            'flat' => 'required',
        ]);

        
        
        $flat = new flat_type;
        $flat -> name = $req -> flat;
        $flat -> save();
        
        return redirect()->back();
    }

    

    public  function  flatdelete(Request $request)
    {
        
        $flats = flat_type::find($request->id);
        $flats->delete();
        return  redirect()->back();
        
    }
}
