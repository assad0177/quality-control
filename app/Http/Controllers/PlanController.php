<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Test;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class PlanController extends Controller
{        /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $plans=Plan::all();
       $i=1;
       return view('plan.index',compact('plans','i'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       $tests=Test::all();
       return view('plan.createPlan',compact('tests'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
    //    dd($request->all());
       $request->validate([
           'name'=>'required',
           'description'=>'required',
           'price' => 'required',
           'duration' => 'required',
           'no_of_operations' => 'required',
           'tests'=>'required'
       ]);

       try{
            $plan=new Plan();
            $plan->name=$request->name;
            $plan->description=$request->description;
            $plan->price=$request->price;
            $plan->duration=$request->duration;
            $plan->no_of_operations=$request->no_of_operations;

            if($plan->save())
            {
                $plan->test()->attach($request->tests);
            }

       }catch(\Exception $e)
       {
            return Response()->json(['status'=>'Error','message'=>$e]);
       }

           return redirect()->route('plan.index');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $plan=Plan::where('id',$id)->first();
       $temp=0;
    $tests=Test::all();
       return view('plan.editPlan',compact('plan','temp','tests'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
    $request->validate([
        'name'=>'required',
        'description'=>'required',
        'price' => 'required',
        'duration' => 'required',
        'no_of_operations' => 'required',
        'tests'=>'required'
    ]);

    // dd($request->all());
    try{
         $plan=Plan::where('id',$id)->first();
         $plan->name=$request->name;
         $plan->description=$request->description;
         $plan->price=$request->price;
         $plan->duration=$request->duration;
         $plan->no_of_operations=$request->no_of_operations;

         if($plan->save())
         {
             $plan->test()->sync($request->tests);
         }
    }catch(\Exception $e)
    {
         return Response()->json(['status'=>'Error','message'=>$e->getMessage()]);
    }

        return redirect()->route('plan.index');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Plan::where('id',$id)->delete();
       return redirect()->route('plan.index');
   }

}
