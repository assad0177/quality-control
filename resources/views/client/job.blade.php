@extends('layouts.app')

@section('content')
    <div class="container mb-3 ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="mt-2" style=" text-align:center">
                        <h1>Jobs</h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table cellpadding="10px"cellspacing="10px" class=" table actionTable table-striped  mydatatable" id="actionTable"  style="width:100%;" >
                                <thead>
                                        <tr>
                                        <th style="padding-left:5px">Sr.</th>
                                        <th style="padding-left:11px">Terminal Username</th>
                                        <th style="padding-left:15px">Client Name</th>
                                        <th style="padding-left:5px">Udid</th>
                                        <th style="padding-left:5px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job )
                                        <tr>
                                            <td style="padding-left:5px" >{{$i++}}</td>
                                            <td style="padding-left:11px">{{$job->terminal->username}}</td>
                                            <td style="padding-left:11px">{{$job->udid}}</td>
                                            <td style="padding-left:15px">{{$job->client->first_name}}</td>
                                            <td style="padding-left:30px">
                                            <a class="btn btn-success" href="{{route('job.report',$job->id)}}">View Report</a>
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
