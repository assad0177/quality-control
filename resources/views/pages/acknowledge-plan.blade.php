@extends('layouts.master')

@section('content')
<section id="hero-5" class="bg-scroll hero-section">
    <div class="banner division">
        <div class="container white-color">
            <div class="row "  >
                <div style="margin-top:8px" class="col-sm-9 col-md-8 hero-txt">
                    <h2 class="acknowledge-text" >Acknowledge The Information And Checkout</h2>
                    {{-- <a href="javascript:history.back()"  class="btn btn-lg tra-hover">Click To Edit Your Information<i class="fa fa-sign-in" aria-hidden="true"></i></a> --}}
                    <a onclick="window.history.back()"  class="btn btn-lg tra-hover">Click To Edit Your Information<i class="fa fa-sign-in" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="register_details hero-row-70">
    <div class="container">
        <div class="row w-70">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-4">
                       <table class="table table-clear">
                            <thead>
                                <th>Personal Information</th>
                            </thead>
                            <tbody>
                                <tr>
                                     <td class="left"><strong>Name</strong></td>
                                    <td class="right">{{$requestData['first_name']}} {{$requestData['last_name']}}</td>
                                </tr>
                                <tr>
                                    <td class="left"><strong>Email</strong></td>
                                    <td class="right">
                                        {{$requestData['email']}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="left"><strong>Username</strong></td>
                                    <td class="right">
                                        {{$requestData['username']}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Plan Name</th>
                                <th class="center">Type</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plans as $plan )
                                <tr>
                                    <td class="center">{{$i++}}</td>
                                    <td class="left">{{$plan->name}}</td>
                                    <td class="left">{{$plan->duration==0 ? "Monthly" : "Yearly"}}</td>
                                    <td class="center">{{$plan->price}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-4 col-sm-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</div>
                    <div class="col col-4"></div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left ">
                                        <strong>Grand Total</strong>
                                    </td>
                                    <td class="right ">
                                        <strong>$ {{$grandTotal}}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container">
                <form action="{{route('payAndRegister')}}" method="post">
                    @csrf
                    <input type="hidden" name="requestData" value="{{json_encode($requestData)}}">
                    <button type="button" class="btn btn-lg tra-hover " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Checkout
                    </button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Acknowledgement</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="wait">
                                    Are You Sure You Want To Continue?
                                </div>
                                <div class="modal-footer">
                                    <button style="background-color: #ac2925; border:none" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button id="continue" type="submit" style="padding-left:22px; padding-right:22px; padding-top:7px; padding-bottom:7px" class="btn btn-lg tra-hover ">continue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
