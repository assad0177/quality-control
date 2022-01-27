@extends('layouts.app')

@section('content')

<div class="conatiner-fluid mt-3">
    <div class="row">
        <div class=" col-3">
            <div style="border-radius:9px;padding: 10px;box-sizing: border-box; display: block;color: #fff!important;" class="small-box bg-info">
                <div  class="inner">
                    <h3 style="color: #fff">$</h3>
                    <p style="color: #fff" >Amount Spent In Total</p>
                </div>
                <div  class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <div style="background-color: rgba(0,0,0,.1);border-radius:5px;text-align:center">
                    <a href="#" style="color:white; " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class=" col-3">
            <div style="border-radius:9px;padding: 10px;box-sizing: border-box; display: block;color: #fff!important;" class="small-box bg-success  ">
                <div  class="inner">
                    <h3 style="color: #fff">$</h3>
                    <p style="color: #fff" >Amount Spent In Total</p>
                </div>
                <div  class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <div style="background-color: rgba(0,0,0,.1);border-radius:5px;text-align:center">
                    <a href="#" style="color:white; " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>


        <div class=" col-3">
            <div style="border-radius:9px;padding: 10px;box-sizing: border-box; display: block;color: #fff!important;" class="small-box bg-warning">
                <div  class="inner">
                    <h3 style="color: #fff">$</h3>
                    <p style="color: #fff" >Amount Spent In Total</p>
                </div>
                <div  class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <div style="background-color: rgba(0,0,0,.1);border-radius:5px;text-align:center">
                    <a href="#" style="color:white; " class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class=" col-3">
            <div style="border-radius:9px;padding: 10px;box-sizing: border-box; display: block;color: #fff!important;" class="small-box bg-danger">
                <div  class="inner">
                    <h3 style="color: #fff">$</h3>
                    <p style="color: #fff" >Amount Spent In Total</p>
                </div>
                <div  class="icon">
                    <i class="ion ion-bag"></i>
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
                            <td class="right"></td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong>Email</strong>
                            </td>
                            <td class="right"></td>
                        </tr>

                    </tbody>
                </table>
    </div>
</div>
    <div class="main py-4">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="col-12 px-0">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="fs-5 fw-bold mb-1">{{ __('Dashboard') }}</h2>
                            <p>{{ __('You are logged in as Terminal !') }}</p>

                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <table class="table table-clear">
                                        <thead style="border-bottom:1px solid black">
                                            <th>Terminal Information</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="left"><strong>Terminal Username</strong></td>
                                                <td class="right">{{$terminal->username}}</td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Client Name</strong></td>
                                                <td class="right">
                                                    {{$terminal->client->first_name."   ".$terminal->client->last_name}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="left"><strong>Plan Name</strong></td>
                                                <td class="right">
                                                    {{$terminal->plan->name}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    @php
                                        $hash = Crypt::encryptString(json_encode(['c_id' => $terminal->client_id,'t_id' => $terminal->id]));
                                    @endphp
                                    {{$hash}}
                                    <p style="text-align: right">{{QrCode::size(200)->generate($hash);}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
