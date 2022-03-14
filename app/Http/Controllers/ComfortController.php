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

class ComfortController extends Controller
{
    public function comfort()
    {
        $bilish = User::find(Session::get('admin'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }
        
        

        $flats = flat_type::all();
        $comforts = DB::table('comforts')
        ->join('flat_types', 'comforts.flat_type', '=', 'flat_types.id')
        ->select('flat_types.name', 'comforts.name as comfortname', 'comforts.id') 
        ->orderby('comforts.flat_type')->get();

        return view('admin.comfort')->with(['flats'=>$flats, 'comforts' => $comforts]);
    }

    public function comfortcode(Request $req)
    {
        
        $req ->validate([
            'name' => 'required',
            'flat' => 'required',
        ]);
             
        $comfort = new comfort;
        $comfort -> name = $req -> name;
        $comfort -> flat_type = $req -> flat;
        $comfort -> save();
        
        return redirect()->back();
    }

    public  function  comfortdelete(Request $request)
    {
        
        $comforts = comfort::find($request->id);
      
        $comforts->delete();
        return  redirect()->back();
        
    }


}
