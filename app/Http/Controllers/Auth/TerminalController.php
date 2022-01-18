<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:terminal');
    }
    public function index()
    {
        return view('terminal');
    }
}
