@extends('layouts.app')

@section('content')


<div class="container-fluid mb-3 ">
    <div class="row">
        <div class="col-12">
            <div class="card" style="	box-shadow: 2px 5px 5px 5px rgba(50, 50, 50, 0.4)">
                <div class="card-body ">

                    <div class="card mb-4" style="box-shadow: 1px 1px 1px 1px rgba(50, 50, 50, 0.4)">
                        <div class="card-body">
                            <h5 class="card-title">Client Side</h5>
                            <a href=""><button type="button" style="text-align:right" class=" mb-3 mt-3 btn btn-primary">Add Terminal</button></a>
                        </div>
                    </div>
{{--    <div class="card mt-3" style="box-shadow: 1px 1px 1px 1px rgba(50, 50, 50, 0.4)">
                        <h5 class="card-title">Subscriptions</h5>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table cellpadding="10px"cellspacing="10px" class=" table actionTable table-striped  mydatatable" id="actionTable"  style="width:100%;" >
                                    <thead>
                                        <tr>
                                            <th style="padding-left:5px">Sr.</th>
                                            <th style="padding-left:11px">Start Date</th>
                                            <th style="padding-left:15px">End Date</th>
                                            <th style="padding-left:15px">Type</th>
                                            <th style="padding-left:5px">Terminal Username</th>
                                            <th style="padding-left:5px">Plan Name</th>
                                            <th style="padding-left:5px">Tests Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscriptions as $subscription )
                                            <tr>

                                                <td style="padding-left:5px" >{{$i++}}</td>
                                                <td style="padding-left:5px" >{{$subscription->start_date}}</td>
                                                <td style="padding-left:10px" >{{$subscription->end_date}}</td>
                                                <td style="padding-left:5px" >{{$subscription->plan->duration==0 ? 'Monthly' : 'Yearly'}}</td>
                                                <td style="padding-left:10px;" >{{$subscription->terminal->username}}</td>
                                                <td style="padding-left:10px" >{{$subscription->plan->name}}</td>
                                                <td style="padding-left:15px;" class="scrollY">
                                                    @foreach ($subscription->plan->test as $test )
                                                    <ul>
                                                        <li>{{$test->name}}</li>
                                                    </ul>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="card mt-5" style="box-shadow: 1px 1px 1px 1px rgba(50, 50, 50, 0.4)">
                        <h5 class="card-title">Invoice</h5>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table cellpadding="10px"cellspacing="10px" class=" table actionTable table-striped  mydatatable" id="actionTable"  style="width:100%;" >
                                    <thead>
                                        <tr>
                                            <th style="padding-left:5px">Sr.</th>
                                            <th style="padding-left:11px">Start Date</th>
                                            <th style="padding-left:15px">End Date</th>
                                            <th style="padding-left:15px">Type</th>
                                            <th style="padding-left:5px">Terminal Username</th>
                                            <th style="padding-left:5px">Plan Name</th>
                                            <th style="padding-left:5px">Tests Name</th>
                                            <th style="padding-left:5px">Sub-Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoices as $invoice )
                                            <tr>

                                                <td style="padding-left:5px" >{{$i++}}</td>
                                                <td style="padding-left:5px" >{{$invoice->start_date}}</td>
                                                <td style="padding-left:10px" >{{$invoice->end_date}}</td>
                                                <td style="padding-left:5px" >{{$invoice->plan->duration==0 ? 'Monthly' : 'Yearly'}}</td>
                                                <td style="padding-left:10px;" >{{$invoice->terminal->username}}</td>
                                                <td style="padding-left:10px" >{{$invoice->plan->name}}</td>
                                                <td style="padding-left:15px;" class="scrollY">
                                                    @foreach ($invoice->plan->test as $test )
                                                    <ul>
                                                        <li>{{$test->name}}</li>
                                                    </ul>
                                                    @endforeach
                                                </td>
                                                <td style="padding-left:10px" >{{$invoice->plan->price}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                 

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
