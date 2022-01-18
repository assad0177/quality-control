@extends('layouts.master')

@section('content')
<section class="register_details hero-row-70">
    <div class="container">
        <div class="row w-70">
            <div class="col-6">
                <label for="basic-url" class="form-label">First Name</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                    <input disabled type="text" id="first-name" name="f_name" class="form-control" value="{{$requestData['f_name']}}" aria-label="First Name" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-6">
                <label for="basic-url" class="form-label">Last Name</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                    <input disabled type="text" id="last-name" name="l_name" class="form-control" value="{{$requestData['l_name']}}" aria-label="Last Name" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-6">
                <label for="basic-url" class="form-label">Email address</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <input disabled type="email" name="email" id="email" class="form-control" value="{{$requestData['email']}}" aria-label="Recipient's email address" aria-describedby="basic-addon2">
                </div>
            </div>

            <div class="row clearfix add-plan">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover" id="tab_logic">
                        <thead>
                            <tr>
                                <th class="text-center"> # </th>
                                <th class="text-center"> Plan </th>
                                <th class="text-center"> Price </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($plans as $plan)
                            <tr id='addr0'>
                                <td>{{$a}}</td>
                                <td>{{$plans->name}}</td>
                                <td id="amount">{{$plans->amount}}</td>
                            </tr>
                            <tr id='addr1'></tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table>
                        <thead>
                            <tr>
                                <th class="text-center"> GrandTotal </th>
                                <th class="text-center"> {{$grandTotal}} </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="row">
                {{-- <a href="{{ route('client.register') }}" class="btn btn-lg tra-hover m-top-20">Checkout <i class="fa fa-money" aria-hidden="true"></i></a> --}}
            </div>
        </div>
    </div>
</section>

@endsection
