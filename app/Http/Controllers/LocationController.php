<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function terminalMengwiView() 
    {
        return view('terminal-mengwi');
    }
}
