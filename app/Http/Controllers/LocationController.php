<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Floor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function terminalMengwiView() 
    {
        $akap = Floor::where('detail_location', 'like', 'A%')->get();
        $akdp = Floor::where('detail_location', 'like', 'D%')->get();
        $foodCourt = Floor::where('detail_location', 'like', 'FC%')->get();


        return view('terminal-mengwi', compact('akap','akdp','foodCourt'));
    }
}
