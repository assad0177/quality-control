@extends('layouts.app')

@section('content')
    <div class="bg-white rounded shadow p-5 mb-4 mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="mt-2" style=" text-align:center">
                        <h1>Job History</h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table cellpadding="10px"cellspacing="10px" class=" table actionTable table-striped  mydatatable" id="actionTable"  style="width:100%;" >
                                <thead>
                                        <tr>
                                        <th >Sr.</th>
                                        <th >Terminal Username</th>
                                        <th >Client Name</th>
                                        <th >Udid</th>
                                        <th >Job Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job )
                                        <tr>
                                            <td style="padding-left:5px" >{{$i++}}</td>
                                            <td style="padding-left:11px">{{$job->terminal->username}}</td>
                                            <td style="padding-left:11px">{{$job->client->first_name}}</td>
                                            <td>{{$job->udid}}</td>
                                            <td style="padding-left:15px">{{"job-".$job->id}}</td>
                                            <td style="padding-left:15px">
                                            <a class="btn btn-success" onclick="window.open('{{route('viewReport',$job->id,'_blank')}}'); return false;"  href="{{route('viewReport',$job->id)}}">View Report</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
