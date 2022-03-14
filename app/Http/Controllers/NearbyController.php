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

class NearbyController extends Controller
{
    public function nearby()
    {
        $bilish = User::find(Session::get('admin'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }
        
        $flats = flat_type::all();
        $nearbies = DB::table('nearbies')
        ->join('flat_types','nearbies.flat_type', '=', 'flat_types.id')
        ->select('flat_types.name', 'nearbies.name as nearbyname', 'nearbies.id')
        ->orderBy('nearbies.flat_type')->get();

        return view('admin.nearby')->with(['flats'=>$flats, 'nearbies' => $nearbies, ]);
    }

    public function nearbycode(Request $req)
    {
        
        
        $req ->validate([
            'nearby' => 'required',
            'flat' => 'required',
        ]);
        
        
        
        $nearby = new nearby;
        $nearby -> name = $req -> nearby;
        $nearby -> flat_type = $req -> flat;
        $nearby -> save();
        
        return redirect()->back();
    }

    public function nearbydelete(Request $request)
    {
        $nearbies = nearby::find($request->id);
        $nearbies->delete();
        return redirect()->back();
    }

    
}
