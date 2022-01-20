@extends('layouts.master')

@section('content')

<section id="hero-5" class="bg-scroll hero-section">
    <div class="banner division">
        <div class="container white-color">
            <div class="row "  >
                <div style="margin-top:8px" class="col-sm-9 col-md-8 hero-txt">
                    <h2 class="acknowledge-text" >Acknowledge The Information And Checkout</h2>
                    <a href="{{url()->previous()}}"  class="btn btn-lg tra-hover">Click To Edit Your Information<i class="fa fa-sign-in" aria-hidden="true"></i></a>
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
                                <tr>                         <td class="left"><strong>Name</strong></td>
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
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="right">$8.497,00</td>
                                </tr>

                                <tr>
                                    <td class="left ">
                                        <strong>Grand Total</strong>
                                    </td>
                                    <td class="right ">
                                        <strong>$7.477,36</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="container">
                <!-- Trigger the modal with a button -->
                <a ></a><button type="button" class="btn btn-lg tra-hover m-top-20" >Checkout<i class="fa fa-money" aria-hidden="true"></i></button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Acknowledge</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are You Sure You Want To Continue?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-lg tra-hover m-top-20" style="background-color: #ac2925" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-lg tra-hover m-top-20" href="{{route('payAndRegister')}}">Continue</button>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
