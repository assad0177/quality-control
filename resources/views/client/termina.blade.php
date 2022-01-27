@extends('layouts.app')

@section('content')
    <div class="  bg-white rounded shadow p-5 mb-4 mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card " style="	box-shadow: 5   px 5px 25px 1px rgba(50, 50, 50, 0.4)">
                    <div class="row mt-4">
                        <div class="col col-8">
                            <div class="mt-2" style=" text-align:center">
                                <h1>Terminal</h1>
                            </div>
                            <a href="{{route('client.addTermina')}}"><button type="button" style="text-align:right" class=" ml-4 mb-3 mt-3 btn btn-primary">Add Terminal</button></a>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table cellpadding="10px"cellspacing="10px" class=" table actionTable table-striped  mydatatable" id="actionTable"  style="width:100%;" >
                                        <thead >
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Terminal Username</th>
                                                <th>Plan Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($terminals as $terminal )
                                                <tr>
                                                    <td style="padding-left:5px" >{{$i++}}</td>
                                                    <td style="padding-left:11px">{{$terminal->username}}</td>
                                                    <td style="padding-left:11px">{{$terminal->plan->name}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
