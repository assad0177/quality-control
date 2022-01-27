<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Plan;
use App\Models\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PageNavigationController extends Controller
{
    public function index()
    {
        try{
            $monthlyPlans=Plan::where('duration',0)->take(3)->get();
            $yearlyPlans=Plan::where('duration',1)->take(3)->get();
            return view('pages.welcome',compact('monthlyPlans','yearlyPlans'));
        }catch(\Exception $e)
        {
        return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }

    public function allPlans()
    {
        try{
            $monthlyPlans=Plan::where('duration',0)->get();
            $yearlyPlans=Plan::where('duration',1)->get();
            $count=Plan::all()->count();
            return view('pages.all-plans',compact('monthlyPlans','yearlyPlans'));
        }catch(\Exception $e)
        {
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }

    public function singlePlanDetail($id)
    {
        try{
            $plan=Plan::where('id',$id)->first();
            return view('pages.single-plan-detail',compact('plan'));
        }catch(\Exception $e)
        {
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }

    public function buyPlan($id)
    {
        try{
            $plann=Plan::where('id',$id)->first();
            $plans=Plan::all();
            return view('pages.client-resgister-plan-selecter',compact('plann','plans'));
        }catch(\Exception $e)
        {
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }

    public function getPlanPrice(Request $request)
    {
        try{
            $plan=Plan::where('id',$request->id)->first();
            return response()->json(['status'=>200 ,'price'=>$plan->price]);
        }catch(\Exception $e)
        {
           return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }

    public function acknowledgePlan(Request $request)
    {
        try{
            $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'username'=>'required',
                'email'=>'required',
                'password'=>'required|min:8',
                'confirm_password'=>'required|min:8',
            ]);
            $i=1;
            $requestData=$request->all();
            $plans=Plan::whereIn('id',$request->plan_ids)->get();
            $count=$plans->count();
            $grandTotal=0;
            for($i=0 ; $i<$count ; $i++)
            {
                $grandTotal+=$plans[$i]->price;
            }
            return view('pages.acknowledge-plan',compact('requestData','i','plans','grandTotal'));
        }catch(\Exception $e)
        {
           return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }

    public function payAndRegister(Request $request)
    {
        DB::beginTransaction();
        try{
            $requestData=json_decode($request->requestData);

            $client=new Client();
            $client->first_name=$requestData->first_name;
            $client->last_name=$requestData->last_name;
            $client->username=$requestData->username;
            $client->email=$requestData->email;
            $client->password=Hash::make($requestData->password);
            $newClient=$client->save();

            // DB::table('subscriptions')->insert([
            //     'first_name'=>$requestData->first_name,
            // 'last_name'=>$requestData->last_name,
            // 'username'=>$requestData->username,
            // 'email'=>$requestData->email,
            // 'password'=>Hash::make($requestData->password),
            // ]);

            $count=Plan::whereIn('id',$requestData->plan_ids)->count();
            $details=array();

            for($i=0; $i<$count; $i++)
            {
                $random_password=(\App\Helpers\Helper::getRandomString(10));
                $terminal=New Terminal();
                $terminal->username='temporary';
                $terminal->password=Hash::make($random_password);
                $terminal->client_id=$client->id;
                $terminal->plan_id=$requestData->plan_ids[$i];
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
            return view('pages.thankyou');

        }catch(\Exception $e)
        {
            DB::rollback();
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }

    }

    public function thankyou()
    {
        try{
            return view('pages.thankyou');
        }catch(\Exception $e)
        {
        return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
}
