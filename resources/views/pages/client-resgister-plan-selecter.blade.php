@extends('layouts.master')

@section('content')

            <!-- HERO-5
            ============================================= -->
            <section id="hero-5" class="bg-scroll hero-section">
                <div class="banner division">
                    <div class="container white-color">
                        <div class="row "  >
                            <div style="margin-top:8px" class="col-sm-9 col-md-8 hero-txt">
                                <h2 class="acknowledge-text" >Already Have An Account?</h2>
                                <a href="{{route('client.login')}}"  class="btn btn-lg tra-hover">Login<i class="fa fa-sign-in" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- HERO-5
            ============================================= -->

            <section class="register_section">
                <div class="container">
                    <div class="register-heading text-center">
                        <h3>Create Account</h3>
                    </div>
                    <form method="POST" class=register_form action="{{route('acknowledgePlan')}}">
                        @csrf
                        <div class="row w-70">
                            <div class="col-6">
                                <label for="basic-url" class="form-label">First Name</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                    <input type="text" id="first_name" name="first_name" value="{{(isset($request->data)) ? $request->first_name : old('first_name')}}" class="form-control" placeholder="First Name" aria-label="First Name" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="basic-url" class="form-label">Last Name</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                    <input type="text" id="last_name" value="{{ old('last_name') }}" name="last_name" class="form-control" placeholder="Last Name" aria-label="First Name" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="basic-url" class="form-label">Email address</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="@example.com" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                </div>
                            </div>

                                <div class="col-6">
                                <label for="basic-url" class="form-label">Username</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                                    <input  type="text" id="username" placeholder="Username"value="{{ old('username') }}" name="username" class="form-control" aria-label="UserName" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="basic-url" class="form-label">Password</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input type="password" name="password" id="password"  class="form-control" placeholder="Password" id="password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="basic-url" class="form-label">Confirm Password</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control" id="password_confirmation" required>
                                </div>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
                                            <tr id='addr0'>
                                                <td>1</td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                        <select class="form-select plan" name="plan_ids[]">
                                                            @foreach ($plans as $plan)
                                                                <option @if($plann->id==$plan->id) selected @endif  value="{{$plan->id}}">{{$plan->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="plan_price">
                                                    <input readonly type="number" value="{{$plann->price}}" name='price[]' placeholder='Unit Price' class="price form-control"/>
                                                </td>
                                            </tr>
                                            <tr id='addr1'></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                <button id="add_row" class="btn btn-default  pull-left btn-gray-800" type="button">Add Plan</button>
                                <button id='delete_row' style="background-color:#d43f3a;" class="pull-right btn btn-default btn-gray-800" type="button">Delete Plan</button>
                                </div>
                            </div>

                            <div class="row mt-3 " >
                                <div class="col col-3">
                                    <label class="form-label">Grand Total</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                        <input type="number" readonly name="grand_total" placeholder="0" value="{{$plann->price}}" class="form-control" id="grand_total" >
                                    </div>
                                </div>
                            </div>
                            <div class="submit-btn m-top-30">
                                <button type="submit" class="btn btn-default pull-left btn-gray-800" type="button">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </section>
@endsection
