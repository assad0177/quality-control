<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Subscription;
use Illuminate\Http\Request;

class ClientController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i=1;
        $subscriptions=Subscription::where('client_id',auth()->user()->id)->get();
        $invoices=Subscription::where('client_id',auth()->user()->id)->withTrashed();
        $client=Client::where('id',auth()->user()->id)->first();
        return view('client.index',compact('subscriptions','i','invoices','client'));
    }
}
