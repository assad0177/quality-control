<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Report;
use App\Models\Terminal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
            $tests = $terminal->plan->getAvailableTests();




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
                'test'=>$tests,
                'job_id'=>$job->id,
            ]);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return response()->json(['status'=>false , 'message'=>"Request Failed"]);
        }
    }





    public function setPlanTest(Request $request)
    {

        try{
            $decrypted = Crypt::decryptString($request->hash);
            $decoded = json_decode($decrypted,true);
            $terminal_id = $decoded['t_id'];
            $client_id = $decoded['c_id'];
            $udid=$request->udid;

        }catch(\Illuminate\Contracts\Encryption\DecryptException $e){
            return response()->json(['status'=>false , 'message'=>"Request Failed"]);
        }




         // for($i=0 ; $i<$test_count ; $i++)
            // {
            //     $report=new Report();
            //     $report->terminal_id;
            //     $report->terminal_id=>;
            //     $report->client_id=>;
            //     $report->udid=>;
            //     $report->job_id=>;
            //     $report->test_id=>;
            //     $report->save();

            // }
    }
}

