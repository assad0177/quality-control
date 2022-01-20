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
{{--
                    <div class="card mt-3" style="box-shadow: 1px 1px 1px 1px rgba(50, 50, 50, 0.4)">
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
                    <div class="container-fluid" style="padding:0px">
                        <div id="ui-view" data-select2-id="ui-view">
                            <div>
                                <div class="card"  >
                                    <div class="card-header">Invoice
                                        <strong>#BBB-10010110101938</strong>
                                        <div style="float: right;">
                                            <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                                                <i class="fa fa-print"></i> Print</a>
                                            <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" data-abc="true">
                                                <i class="fa fa-save"></i> Save</a></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <div class="col-sm-4">
                                                <h6 class="mb-3">From:</h6>
                                                <div>
                                                    <strong>Cartlow.com</strong>
                                                </div>
                                                <div>Lahore, Pakistan</div>
                                                <div>jail Road</div>
                                                <div>Email: cartlow@cartlow.com</div>
                                                <div>Phone: +48 123 456 789</div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6 class="mb-3">To:</h6>
                                                <div>
                                                    <strong>{{$client->first_name." ".$client->last_name}}</strong>
                                                </div>
                                                <div><strong>Email:</strong> {{$client->email}}</div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6 class="mb-3">Details:</h6>
                                                <div>Invoice
                                                    <strong>#BBB-10010110101938</strong>
                                                </div>
                                                <div>April 30, 2019</div>
                                                <div>VAT: NYC09090390</div>
                                                <div>Account Name: BBBootstrap Inc</div>
                                                <div>
                                                    <strong>SWIFT code: 99 8888 7777 6666 5555</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="center">#</th>
                                                        <th>Item</th>
                                                        <th>Description</th>
                                                        <th class="center">Quantity</th>
                                                        <th class="right">Unit Cost</th>
                                                        <th class="right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="center">1</td>
                                                        <td class="left">Iphone 10</td>
                                                        <td class="left">Apple iphoe 10 with extended warranty</td>
                                                        <td class="center">16</td>
                                                        <td class="right">$999,00</td>
                                                        <td class="right">$999,00</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="center">2</td>
                                                        <td class="left">Samsung S6</td>
                                                        <td class="left">Samsung S6 with extended warranty</td>
                                                        <td class="center">20</td>
                                                        <td class="right">$150,00</td>
                                                        <td class="right">$3.000,00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</div>
                                            <div class="col-lg-4 col-sm-5 ml-auto">
                                                <table class="table table-clear">
                                                    <tbody>
                                                        <tr>
                                                            <td class="left">
                                                                <strong>Subtotal</strong>
                                                            </td>
                                                            <td class="right">$8.497,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="left">
                                                                <strong>Discount (20%)</strong>
                                                            </td>
                                                            <td class="right">$1,699,40</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="left">
                                                                <strong>VAT (10%)</strong>
                                                            </td>
                                                            <td class="right">$679,76</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="left">
                                                                <strong>Total</strong>
                                                            </td>
                                                            <td class="right">
                                                                <strong>$7.477,36</strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <a  class="btn btn-success mt-4"  href="#" data-abc="true">
                                                <i class="fa fa-usd"></i> Proceed to Payment</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
