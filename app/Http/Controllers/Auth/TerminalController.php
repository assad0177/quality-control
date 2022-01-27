<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Job;
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
    public function jobHistory()
    {
        $i=1;
        $jobs=Job::where('terminal_id',auth()->user()->id)->get();
        return view('terminal.job-history',compact('jobs','i'));
    }


}
