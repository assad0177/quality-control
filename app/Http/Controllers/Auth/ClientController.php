<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Job;
use App\Models\Report;
use App\Models\Subscription;
use App\Models\Terminal;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Mail\TestMail;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        $client=Client::where('id',auth()->user()->id)->first();
        $subscriptions=Subscription::where('client_id',auth()->user()->id)->get();
        $subscription_count=Subscription::where('client_id',auth()->user()->id)->withTrashed()->count();

        $terminals=Terminal::where('client_id',auth()->user()->id)->get();
        $terminal_count=Terminal::where('client_id',auth()->user()->id)->count();
        $moneySpent=0;
        foreach($terminals as $terminal)
        {
                $moneySpent=$moneySpent+$terminal->plan->price;
        }
        return view('client.index',compact('i','subscriptions','terminals','subscription_count','terminal_count','moneySpent','client'));
    }

    public function clientJob()
    {
        $i=0;
        $jobs=Job::where('client_id',auth()->user()->id)->get();
        return view('client.job',compact('jobs','i'));
    }

    public function clientInvoice()
    {
        $invoiceNo = Helper::rand_number(14);
        $client = Client::where('id', auth()->user()->id)->first();
        $terminals = Terminal::where('client_id', auth()->user()->id)->get();
        $count = Terminal::where('client_id', auth()->user()->id)->get()->count();
        $a = 1;
        $grandTotal = 0;
        $subTotal = 0;
        for($i=0; $i<$count; $i++)
        {
            $price[$i] = $terminals[$i]->plan->price;
            $subTotal += $price[$i];
        }
        $vat = $subTotal*5/100;
        $discount = $subTotal*0/100;
        $grandTotal = $subTotal+$vat-$discount;
        return view('client.invoice', compact('terminals', 'grandTotal', 'a', 'invoiceNo', 'vat', 'discount', 'subTotal', 'client'));
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
        $i=1;
        $job=Job::where('client_id',auth()->user()->id)->first();
        $report=Report::where('client_id',auth()->user()->id)->first();
        $pdf=PDF::loadView('client.view-download-invoice',compact('client','i'));
        return $pdf->download('invoice.pdf');
    }

    public function viewReport($id)
    {
        $i=1;
        $client=Client::where('id',auth()->user()->id)->first();
        $job=Job::where('id',$id)->first();
        $terminal=$job->terminal;
        $reports=Report::where('job_id',$id)->get();
        $pdf=PDF::loadView('client.view-download-report',compact('reports','client','terminal','job','i'));
        return $pdf->stream();
    }

    public function clientTermina()
    {
        $i=1;
        $terminals=Terminal::where('client_id',auth()->user()->id)->get();
        return view('client.termina',compact('terminals','i'));
    }

    public function AddClientTermina()
    {
        $plans=Plan::all();
        return view('client.add-terminal',compact('plans'));
    }

    public function saveTermina(Request $request)
    {
        DB::beginTransaction();
        try{

            //creating terminals
            $count=Plan::whereIn('id',$request->plan_ids)->count();
            $random_password=0;
            $random_username=0;
            $details=array();

            $client=auth()->user();

            for($i=0; $i<$count; $i++)
            {
                $random_password=(\App\Helpers\Helper::getRandomString(10));
                $terminal=New Terminal();
                $terminal->username='temporary';
                $terminal->password=Hash::make($random_password);
                $terminal->client_id=$client->id;
                $terminal->plan_id=$request->plan_ids[$i];
                $terminal->save();

                $terminal->username='ctp'.$client->id.$terminal->id;
                $random_username='ctp'.$client->id.$terminal->id;
                $terminal->update();
                $details[$i]=[
                    'username'=>$random_username,
                    'password'=>$random_password
                ];

                $subscription=new Subscription();
                $plan=Plan::where('id',$terminal->plan_id)->first();
                $plan->duration == 0 ? $subscription->end_date=Carbon::now()->addMonth() : $subscription->end_date=Carbon::now()->addYear();
                DB::table('subscriptions')->insert([
                    'start_date'=>Carbon::now(),
                    'end_date'=>$subscription->end_date,
                    'client_id'=>$client->id,
                    'terminal_id'=>$terminal->id,
                    'plan_id'=>$plan->id
                ]);
            }
            Mail::to($client->email)->send(new TestMail($details));
            DB::commit();
            return redirect()->route('client.dashboard');
        }catch(\Exception $e)
        {
            DB::rollback();
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
}
