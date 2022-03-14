<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\region;
use App\Models\district;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    public function district()
    {
        $bilish = User::find(Session::get('admin'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }
    
        
        $regions = region::all();
        
        $districts = DB::table('districts')
        ->join('regions', 'districts.region_id', '=', 'regions.id')
        ->select('regions.name', 'districts.name as districtname', 'districts.id')
        ->orderBy('districts.region_id')->get();
        

        return view('admin.district')->with(['regions'=>$regions, 'districts' => $districts]);

    }

    public function districtcode(Request $req)
    {
        $district = new district;
        $district -> name = $req->district;
        $district -> region_id = $req->region;
        $district -> save();
        
        return redirect()->back();
    }

    public  function  districtdelete(Request $request)
    {
        
        $districts = district::find($request->id);
      
        $districts->delete();
        return  redirect()->back();
        
    }

}
