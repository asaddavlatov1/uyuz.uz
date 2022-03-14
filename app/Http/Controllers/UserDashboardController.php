<?php

namespace App\Http\Controllers;

use App\Models\flat;
use App\Models\image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    public function index($id)
    {
        $bilish = User::find(Session::get('user'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }

        $flats = DB::table('flats')
        ->join('regions', 'flats.region', '=', 'regions.id')
        ->join('districts', 'flats.district', '=', 'districts.id')  
        ->where('flats.id', '=', $id)      
        ->select('flats.name', 'flats.url')->first();


        $images = DB::table('images')
        ->join('flats', 'images.flat', '=', 'flats.id')
        ->where('flats.id', '=', $id)
        ->select('images.url', 'flats.id', 'images.flat')->get();
        
        return view('user.flats.show')->with(['flats'=>$flats])->with(['images'=>$images]);
    }



    public function show()
    {
        $bilish = User::find(Session::get('user'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }

        return view('user.index');

    }

    public function usercabinet()
    {
        $bilish = User::find(Session::get('user'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }

        return view('user.usercabinet');



    }

    public function userflats()
    {
        $bilish = User::find(Session::get('user'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }

        $images = array();


        $flats = DB::table('flats')
        ->join('regions', 'flats.region', '=', 'regions.id')
        ->join('districts', 'flats.district', '=', 'districts.id')
        ->where('flats.user', '=', $bilish->id)
        ->select('flats.id', 'flats.name', 'flats.url')
        ->get();
                
        return view('user.flats.index')->with(['flats'=>$flats]);

    }

    public function addflats()
    {
        $bilish = User::find(Session::get('user'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }

        

    }


}
