<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Job;
use App\Models\Report;
use App\Models\Subscription;
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
        $client=Client::where('id',auth()->user()->id)->first();
        return view('client.index',compact('subscriptions','i','invoices','client'));
    }

    public function jobReport($id)
    {
        $reports=Report::where('job_id',$id)->get();
        return view('client.job-report',compact('reports'));
    }
    public function jobs()
    {
        $i=0;
        $jobs=Job::where('client_id',auth()->user()->id)->get();
        return view('client.job',compact('jobs','i'));
    }
    public function generatePdf()
    {
        dd("menu lab lo");
    }
    // public function makePdf()
    // {

    //     // $pdf = \PDF::loadView('pdf.certificate');
    //     $books=Book::all();
    //     $i=1;
    //     $pdf = \PDF::loadView('book.bookPdf',compact('books','i'));
    //     return $pdf->stream();
    // }
    // public function downloadPdf()
    // {
    //     $books=Book::all();
    //     // $pdf = \PDF::loadView('pdf.certificate');
    //     $i=1;
    //     $pdf = \PDF::loadView('book.bookPdf',compact('books','i'));
    //     return $pdf->download('book-detail.pdf');
    // }

}
