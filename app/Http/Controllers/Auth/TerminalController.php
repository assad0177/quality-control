<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TerminalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:terminal');
    }
    public function index()
    {
        $terminal=Terminal::where('id',auth()->user()->id)->first();
        return view('terminal.index',compact('terminal'));
    }


}
