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
        $floors = Floor::get();

        return view('terminal-mengwi', compact('floors'));
    }
}
