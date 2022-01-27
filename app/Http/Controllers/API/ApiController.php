<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Report;
use App\Models\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getPlanTest(Request $request)
    {
         try {
            $decrypted = Crypt::decryptString($request->hash);
            $decoded = json_decode($decrypted,true);
            $terminal_id = $decoded['t_id'];
            $client_id = $decoded['c_id'];
            $udid=$request->udid;
            $terminal = Terminal::where('id',$terminal_id)->first();
            $tests = $terminal->plan->test;

            $job=new Job();
            $job->terminal_id=$terminal_id;
            $job->client_id=$client_id;
            $job->udid=$udid;
            $job->save();

            return response()->json([
                'status'=>true,
                'message'=>'Request Completed Successfully',
                'hash'=>$request->hash,
                'udid'=>$request->udid,
                'tests'=>$tests,
                'job_id'=>$job->id,
            ]);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return response()->json(['status'=>false , 'message'=>"Request Failed"]);
        }
    }





    public function setPlanTest(Request $request)
    {
        DB::beginTransaction();
        try{
            $decrypted = Crypt::decryptString($request->hash);
            $decoded = json_decode($decrypted,true);
            $terminal_id = $decoded['t_id'];
            $client_id = $decoded['c_id'];
            $udid=$request->udid;
            $job_id=$request->job_id;
            // dd($request->tests[0]['id']);
            $count=count($request->tests);

            for($i=0 ; $i<$count ; $i++)
            {
                DB::table('reports')->insert([
                    'terminal_id'=>$terminal_id,
                    'client_id'=>$client_id,
                    'udid'=>$udid,
                    'job_id'=>$job_id,
                    'test_id'=>$request->tests[$i]['id'],
                    'status'=>$request->tests[$i]['status'],
                ]);
            }
            DB::commit();
            return response()->json([
                'status'=>true,
                'message'=>'Request Completed Successfully'
            ]);


        }catch(\Illuminate\Contracts\Encryption\DecryptException $e){
            DB::rollback();
            return response()->json(['status'=>false ,'message'=>"Request Failed"]);
        }
    }
}

