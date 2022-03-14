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

class AdminController extends Controller
{
    public function show()
    {
        $bilish = User::find(Session::get('admin'));
        if(empty($bilish))
        {
            return redirect('/login')->with('Xakkerlik qilmang!!!');
        }

        return view('layouts.index');

    }

}
