<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\region;

class RegionController extends Controller
{
    public function region()
    {
        $bilish = User::find(Session::get('admin'));
        if(empty($bilish))
        {
            return redirect('/region')->with('Xakkerlik qilmang!!!');
        }

        $regions = region::all();
        

        return  view('admin.region') ->with(['regions' => $regions]);

    }

    public  function  regiondelete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $regions = region::find($request->id);
        $regions->delete();
        return  redirect()->back();
    }

    public function regioncode(Request $req)
    {
        $region = new region;
        $region -> name = $req->region;
        $region->save();
        
        return redirect()->back();
    }
}
