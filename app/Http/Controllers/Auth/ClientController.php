<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Job;
use App\Models\Report;
use App\Models\Subscription;
use App\Models\Terminal;
use Illuminate\Http\Request;
use PDF;
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
        return view('client.index',compact('subscriptions','i','invoices'));
    }

    public function viewReport($id)
    {
        $client=Client::where('id',auth()->user()->id)->first();
        $job=Job::where('id',$id)->first();
        $terminal=$job->terminal;
        $reports=Report::where('job_id',$id)->get();
        $pdf=PDF::loadView('client.view-download-report',compact('reports','client','terminal','job'));
        return $pdf->stream();
    }

    public function viewInvoice()
    {
        $client=Client::where('id',auth()->user()->id)->first();
        $pdf=PDF::loadView('client.view-download-invoice',compact('client'));
        return $pdf->stream();
    }

    public function downloadInvoice()
    {
        $client=Client::where('id',auth()->user()->id)->first();
        $job=Job::where('client_id',auth()->user()->id)->first();
        $report=Report::where('client_id',auth()->user()->id)->first();
        $pdf=PDF::loadView('client.view-download-invoice',compact('client'));
        return $pdf->download('invoice.pdf');
    }

    public function clientJob()
    {
        $i=0;
        $jobs=Job::where('client_id',auth()->user()->id)->get();
        return view('client.job',compact('jobs','i'));
    }
    public function clientInvoice()
    {
        $client=Client::where('id',auth()->user()->id)->first();
        return view('client.invoice',compact('client'));
    }


}
