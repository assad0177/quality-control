@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card" style="	box-shadow: 2px 5px 5px 5px rgba(50, 50, 50, 0.4)">
        <div class="card-body">
            <section class="register_section">
                <div class="container">
                    <div class="register-heading text-center">
                        <h3 >Add Terminal</h3>
                    </div>
                    <form method="POST" class=register_form action="{{route('client.saveTermina')}}">
                        @csrf
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
                                                            <option disabled selected >Choose Plan</option>
                                                            @foreach ($plans as $plan)
                                                                <option value="{{$plan->id}}">{{$plan->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="plan_price">
                                                    <input readonly type="number" value="" name='price[]' placeholder='Unit Price' class="price form-control"/>
                                                </td>
                                            </tr>
                                            <tr id='addr1'></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <button id="add_row" style="background-color: rgb(27, 177, 27); color:white" class="mt-4 btn btn-default  pull-left btn-gray-800" type="button">Add Plan</button>
                                    <button id='delete_row' style="background-color:#d43f3a; color:white" class="mt-4 pull-right btn btn-default btn-gray-800" type="button">Delete Plan</button>
                                </div>
                            </div>
                            <div id="mt-3 message"></div>
                            <div class="submit-btn mt-3 m-top-30">
                                <button id="sub" style="background-color: rgb(27, 177, 27); color:white;" type="submit" class="popup btn btn-default pull-left btn-gray-800" type="button">Submit
                                </button>
                            </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
