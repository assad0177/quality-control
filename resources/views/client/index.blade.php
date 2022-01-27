@extends('layouts.app')

@section('content')


<div class="conatiner-fluid mt-3">
    <div class="row ">
        <div class="col-3" >
            <div style="border-radius:9px;padding: 10px;box-sizing: border-box; display: block;color: #fff!important;" class="small-box bg-info">
                <div class="row">
                        <div class="inner">
                            <h3 style="color: #fff">{{$terminal_count}}</h3>
                            <p style="color: #fff">Plans Subscribed</p>
                        </div>
                        <div  class="icon">
                            <i  style="position:absolute;right:20% ;top:20%; color: rgba(0,0,0,.15); font-size:90px" class="fas fa-bar-chart"></i>
                        </div>
                </div>
                <div style="background-color: rgba(0,0,0,.1);border-radius:5px;text-align:center">
                    <a href="{{route('client.termina')}}" style="color:white; " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>

            </div>
        </div>
        <div class=" col-3">
            <div style="border-radius:9px;padding: 10px;box-sizing: border-box; display: block;color: #fff!important;" class="small-box bg-success">
                <div  class="inner">
                    <h3 style="color: #fff">{{$subscription_count}}</h3>
                    <p style="color: #fff" >Subscriptions</p>
                </div>
                <div  class="icon">
                    <i  style="position:absolute;right:20% ;top:20%; color: rgba(0,0,0,.15); font-size:90px" class="fa fa-bell"></i>
                    {{-- <i  style="position:absolute;right:20% ;top:20%; color: rgba(0,0,0,.15); font-size:90px" class="fas fa-bar-chart"></i> --}}
                </div>

                <div style="background-color: rgba(0,0,0,.1);border-radius:5px;text-align:center">
                    <a href="#" style="color:white; " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class=" col-3">
            <div style="border-radius:9px;padding: 10px;box-sizing: border-box; display: block;color: #fff!important;" class="small-box bg-warning">
                <div  class="inner">
                    <h3 style="color: #fff">${{$moneySpent}}</h3>
                    <p style="color: #fff" >Spent Amount</p>
                </div>
                <div  class="icon">
                    <i  style="position:absolute;right:20% ;top:20%; color: rgba(0,0,0,.15); font-size:90px" class="fa fa-usd"></i>
                </div>

                <div style="background-color: rgba(0,0,0,.1);border-radius:5px;text-align:center">
                    <a href="#" style="color:white; " class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class=" col-3">
            <div style="border-radius:9px;padding: 10px;box-sizing: border-box; display: block;color: #fff!important;" class="small-box bg-danger">
                <div  class="inner">
                    <h3 style="color: #fff">${{$moneySpent}}</h3>
                    <p style="color: #fff" >Spent Amount</p>
                </div>
                <div  class="icon">
                    <i  style="position:absolute;right:20% ;top:20%; color: rgba(0,0,0,.15); font-size:90px" class="fa fa-usd"></i>
                </div>

                <div style="background-color: rgba(0,0,0,.1);border-radius:5px;text-align:center">
                    <a href="#" style="color:white; " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="bg-white rounded shadow p-5 mb-4 mt-4">
                <table class="table table-clear ">
                    <thead >
                        <h3 >Personal Information</h3>
                    </thead>
                    <tbody>
                        <tr style="border-top:2px solid black">
                            <td class="left">
                                <strong>Name</strong>
                            </td>
                            <td class="right">{{$client->first_name." ".$client->last_name}}</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Email</strong>
                            </td>
                            <td class="right">{{$client->email}}</td>
                        </tr>

                    </tbody>
                </table>
    </div>
</div>
</div>
</div>
@endsection
