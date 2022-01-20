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

        $terminal=Terminal::where('id',$request->t_id)->first();
        $tests=$terminal->plan->test;

        $job=new Job();
        $job->terminal_id=$request->t_id;
        $job->client_id=$request->c_id;
        $job->udid=$request->udid;
        $job->save();

        $test_count=$terminal->plan->test->count();
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

        return response()->json([
            't_id'=> $request->t_id,
            'c_id'=> $request->c_id,
            'udid'=>$request->udid,
            'test'=>$tests,
            'job_hash'=>Crypt::encryptString($job->id),
        ]);
    }
}
