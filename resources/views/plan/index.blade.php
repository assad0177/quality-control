@extends('layouts.app')

@section('content')
    <div class="container mb-3 ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="mt-2" style=" text-align:center">
                        <h1 >Plan  CRUD </h1>
                    </div>
                    <div class="card-body">
                        <a href="{{route('plan.create')}}"><button type="button" class=" mb-3 btn btn-primary">Add Plan</button></a>
                        <div class="table-responsive">
                            <table cellpadding="10px"cellspacing="10px" class=" table actionTable table-striped  mydatatable" id="actionTable"  style="width:100%;" >
                                <thead>
                                    <tr>
                                        <th style="padding-left:5px">Sr.</th>
                                        <th style="padding-left:11px">Name</th>
                                        <th style="padding-left:15px">Description</th>
                                        <th style="padding-left:5px">Operations</th>
                                        <th style="padding-left:5px">Price</th>
                                        <th style="padding-left:10px">Duration</th>
                                        <th style="padding-left:15px">Test Included</th>
                                        <th style="padding-left:5px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $plan )
                                        <tr>

                                            <td style="padding-left:5px" >{{$i++}}</td>
                                            <td style="padding-left:11px" >{{$plan->name}}</td>
                                            <td style="padding-left:15px" >{{$plan->description}}</td>
                                            <td style="padding-left:5px" >{{$plan->no_of_operations}}</td>
                                            <td style="padding-left:5px" >{{$plan->price}}</td>
                                            <td style="padding-left:10px" >{{$plan->duration==0 ? "Monthly" : "Yearly"}}</td>
                                            <td style="padding-left:15px" >
                                                @foreach ($plan->test as $test )
                                                <ul>
                                                    <li>{{$test->name}}</li>
                                                </ul>
                                                @endforeach
                                            </td>
                                            <td style="padding-left:30px">
                                                <form action="{{route('plan.destroy',$plan->id)}}" method="post">
                                                    <a class="btn btn-success" href="{{route('plan.edit',$plan->id)}}">Edit</a>
                                                    @csrf
                                                    @method('delete')
                                                    <button  class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
