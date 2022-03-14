<?php

namespace App\Http\Controllers;

use App\Models\district;
use App\Models\flat;
use App\Models\flat_type;
use App\Models\region;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function flat()
    {
        $flat_types = flat_type::all();

        return view('welcome')->with(['flat_types'=>$flat_types]);
    }

    public function flat_type($id, Request $req)
    {

        $regions = region::all();
        $districts = district::all();
        $flat_types = flat_type::all();
        
        $flats = array();
        if($req->region > 0)

        {
            
            $flats = DB::table('flats')
            ->join('regions', 'flats.region', '=', 'regions.id')
            ->where('flats.region', '=', $req->region);
            if($req->price1 > 0)
            {

                $flats = $flats->where('flats.price', '>=', $req->price1);
                
            }

            if($req->price2 > 0)
            {
                $flats = $flats->where('flats.price', '<=', $req->price2);
            }

            if($req->num_room1 > 0)
            {
                $flats = $flats->where('flats.num_room', '>=', $req->num_room1);
            }

            if($req->num_room2 > 0)
            {
                $flats = $flats->where('flats.num_room', '<=', $req->num_room2);
            }

            if($req->square1 > 0)
            {
                $flats = $flats->where('flats.square', '>=', $req->square1);
            }

            if($req->square2 > 0)
            {
                $flats = $flats->where('flats.square', '<=', $req->square2);
            }

            if($req->district > 0)
            {
                $flats = $flats->where('flats.district', '=', $req->district);
            }

            if($req->flat_type > 0)
            {
                $flats = $flats->where('flats.flat_type', '=', $req->flat_type);
            }

            $flats = $flats->where('flats.status', '=', 1)
            ->orderBy('flats.id', 'DESC')
            ->get();

        }

        else
        {
            $flats =DB::table('flats')
            ->join('regions', 'flats.region', '=', 'regions.id')
            ->join('districts', 'flats.district', '=', 'districts.id')
            ->where('flats.status', '=', 1)
            ->orderBy('flats.id', 'DESC')
            ->get();
        }

        
        
        return view('filter.flats1')->with(['regions'=>$regions])->with(['flat_types'=>$flat_types])->with(['districts'=>$districts])->with(['flats'=>$flats]);
        
    }
}
