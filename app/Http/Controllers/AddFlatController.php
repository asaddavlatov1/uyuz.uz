<?php

namespace App\Http\Controllers;

use App\Models\comfort;
use App\Models\comfort_table;
use App\Models\district;
use App\Models\flat;
use App\Models\flat_type;
use App\Models\image;
use App\Models\nearby;
use App\Models\nearby_table;
use App\Models\payment_type;
use App\Models\region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;

class AddFlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $table = 'flat';

    public function index()
    {
        $flats = flat::all();
        return view('user.flats.index')->with([
            'flats'=>$flats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flats = flat_type::all();
        $regions = region::all();
        $districts = district::all();
        $payment_types = payment_type::all();
        $nearby = nearby::all();

        return view('user.flats.create')->with(['flats'=>$flats, 'districts'=>$districts, 'regions'=>$regions, 'payment_types'=>$payment_types, 'nearbies'=>$nearby]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required| min:5 | max:30',
            'flat_type'=>'required',
            'region'=>'required',
            'district'=>'required',
            'comment'=>'required',
            'f_storey'=>'required',
            'square'=>'required',
            'phone'=>'required',
            'payment_type'=>'required',
            'storey'=>'required',
            'num_room' =>'required',
            'price' => 'required',
            

        ]);

        $bilish = User::find(Session::get('user'));
        if(empty($bilish))
        {
            return redirect('/')->with('error', 'Siz avval avtorizatsiyadan oting');
        }
        $nearbies = array();
        $comforts = array();
        $j = 0;
        for($i=0;$i<$request->maxsoni1;$i++)
        {  
            $nearby='nearby'.$i;
            if(isset($request->$nearby))
            {
                $nearbies[$j] = $request->$nearby;
                $j++;
            }
            
        
        }

        $j = 0;
        for($i=0;$i<$request->maxsoni2;$i++)
        {  
            $comfort='comfort'.$i;
            if(isset($request->$comfort))
            {
                $comforts[$j] = $request->$comfort;
                $j++;
            }
            
        
        }

        $file = $request->file('photo0')->store('images');
        

        $flat = new flat;
        $flat -> user = $bilish->id;
        $flat ->name = $request -> name;
        $flat -> flat_type = $request -> flat_type;
        $flat -> region = $request ->region;
        $flat ->district = $request->district;
        $flat -> comment = $request->comment;
        $flat -> f_storey = $request->f_storey;
        $flat -> square = $request -> square;
        $flat -> phone = $request ->phone;
        $flat -> payment_type = $request -> payment_type;
        $flat -> storey = $request -> storey;
        $flat -> num_room = $request ->num_room;
        $flat -> price = $request -> price;
        $flat -> url = $file;
        $flat ->save();
        
        
        $n = sizeof($nearbies);
        for($i=0;$i<$n;$i++)
        {
            $nearby = new nearby_table;
            $nearby->nearby = $nearbies[$i];
            $nearby->flat = $flat->id;
            $nearby->status = "0";
            $nearby->save();
        }

        $n = sizeof($comforts);
        for($i=0;$i<$n;$i++)
        {
            $comfort = new comfort_table;
            $comfort->comfort_id = $comforts[$i];
            $comfort->flat_id = $flat->id;
            $comfort->status = "0";
            $comfort->save();
        }
        for($i=1; $i<=10; $i++)
        {
            $photo = "photo".$i;
            if($request->hasFile($photo))
            {
                $file = $request->file($photo)->store('images');
                $image = new image;
                $image -> flat = $flat->id;
                $image -> url = $file;
                $image -> number = 1;
                $image ->save();
            }
            
        }
        
        
        return redirect('/userflats');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createcode(Request $req)
    {
        dd($req);
        
    }


    public function getdistrict(Request $req)
    {
        $districts=district::where('region_id','=',$req->id)->get();
                           
        return response()->json($districts);
    }


    public function getnearby(Request $req)
    {
        $nearby=nearby::where('flat_type','=',$req->id)->get();
                           
        return response()->json($nearby);
    }

    public function getcomfort(Request $req)
    {
        $comfort=comfort::where('flat_type','=',$req->id)->get();
                           
        return response()->json($comfort);
    }



}
