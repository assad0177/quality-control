@extends('layouts.master')

@section('content')

<section id="hero-5" class="bg-scroll hero-section">
    <div class="hero-overlay division">
        <div class="container white-color">


            <!-- Hero Content -->
            <div class="row hero-row-70">
                <div class="col-sm-9 col-md-8 hero-txt">

                    <!-- Title -->
                    <h2 class="h2-hero-huge">Acknowledge The Information And Checkout</h2>

                    <!-- Text -->
                    {{-- <p class="p-hero-medium">Varius feugiat rabitur nulla arcu sodales sapien lacus sed cursus amet cursus porta,
                       egestas luctus feugiat egestas ultrices luctus
                    </p> --}}
                    <!-- Button -->
                    <a href="" class="btn btn-lg tra-hover m-top-20">Click To Edit Your Information <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                             {{-- {{route('buyPlan',$plans[0]->name)}} --}}
                </div>
            </div>


        </div>    <!-- End container -->
    </div>     <!-- End Hero overlay -->
</section>


<section class="register_details hero-row-70">
    <div class="container">
        <div class="row w-70">
                <div class="row">
                    <div class="col col-6">
                        <label for="basic-url" class="form-label">First Name</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                            <input readonly type="text" id="first_name" name="first_name" class="form-control" value="{{$requestData['first_name']}}" aria-label="First Name" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="col col-6">
                        <label for="basic-url" class="form-label">Last Name</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                            <input readonly type="text" id="last_name" name="last_name" class="form-control" value="{{$requestData['last_name']}}" aria-label="First Name" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="basic-url" class="form-label">Email address</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <input readonly type="email" name="email" id="email" class="form-control" value="{{$requestData['email']}}" aria-label="Recipient's email address" aria-describedby="basic-addon2">
                    </div>
                </div>
                <div class="row mt-5 clearfix add-plan">
                    <div class="row">
                        <div class="col col-1">
                            sr.
                        </div>
                        <div class="col col-6">
                            Plan Name
                        </div>
                        <div class="col col-5">
                            Price
                        </div>
                    </div>
                    @foreach ($plans as $plan)
                        <div class="row">
                            <div class="col col-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                    <input readonly type="text" id="i" name="i" class="form-control" value="{{$i++}}" aria-label="First Name" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                    <input readonly type="text" id="plan_name" name="plan_name" class="form-control" value="{{$plan->name}}" aria-label="Plan Name" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col col-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                    <input readonly type="text" id="price" name="price" class="form-control" value="{{$plan->price}}" aria-label="Price Price" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col col-3">
                        <label class="form-label">Grand Total</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <input type="number" readonly name="grand_total" placeholder="0"  class="form-control" id="grand_total" >
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <input readonly type="hidden" name="password" id="password" class="form-control" value="{{$requestData['password']}}" aria-label="" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <input readonly type="hidden" name="confirm_password" id="confirm_password" class="form-control" value="{{$requestData['confirm_password']}}" aria-label="" aria-describedby="basic-addon2">
                        </div>
                    </div>
                    <div class="col col-6">
                        <div class="input-group mb-3">
                            <input readonly type="hidden" id="username" name="username" class="form-control" value="{{$requestData['username']}}" aria-label="username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    {{-- <div class="col-md-12">
                        <table class="table table-bordered table-hover" id="tab_logic">
                            <thead>
                                <tr>
                                    <th style="width:40px" class="text-center"> # </th>
                                    <th class="text-center"> Plan </th>
                                    <th  class="text-center"> Price </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($plans as $plan)
                                <tr id='addr0'>
                                    <td>{{$a}}</td>
                                    <td>{{$plan->name}}</td>
                                    <td id="price">{{$plan->price}}</td>
                                </tr>
                                <tr id='addr1'></tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> --}}
                </div>

                <form action="{{route('payAndRegister')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input readonly type="hidden" id="requestData" name="requestData" class="form-control" value="{{json_encode($requestData)}}" aria-label="username" aria-describedby="basic-addon1">
                    </div>
                    <button class="btn btn-lg tra-hover m-top-20">Checkout<i class="fa fa-money" aria-hidden="true"></i></button>
                </form>
        </div>
    </div>
</section>

@endsection
