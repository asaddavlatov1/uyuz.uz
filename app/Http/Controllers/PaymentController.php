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

class PaymentController extends Controller
{
    public function payment()
    {
        $bilish = User::find(Session::get('admin'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }
        

        $payments = payment_type::all();

        return  view('admin.payment') ->with(['payments' => $payments]);
    }

    public function paymentcode(Request $req)
    {
        
        
        $req ->validate([
            'name' => 'required',
            'sum' => 'required',
        ]);
        
        
        
        $payment = new payment_type;
        $payment -> name = $req -> name;
        $payment -> sum = $req -> sum;
        $payment -> save();
        
        return redirect()->back();
    }

    public  function  paymentdelete(Request $request)
    {

        $payments = payment_type::find($request->id);
        $payments->delete();
        return  redirect()->back();
    }

    

}
