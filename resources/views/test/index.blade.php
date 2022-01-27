@extends('layouts.app')

@section('content')
    <div class="container mb-2 ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="" style=" text-align:center">
                        <h1>Test Crud</h1>
                    </div>
                    <div class="card-body">
                        <a href="{{route('test.create')}}"><button type="button" class=" mb-3 btn btn-primary">Add Test</button></a>
                        <div class="table-responsive">
                            <table cellpadding="10px"cellspacing="10px" class=" table actionTable table-striped  mydatatable" id="actionTable"  style="width:100%;" >
                                <thead>
                                    <tr>
                                        <th >Sr.</th>
                                        <th class="name">Name</th>
                                        <th >Description</th>
                                        <th >Status</th>
                                       <th >Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tests as $test )
                                        <tr>
                                            <td >{{$i++}}</td>
                                            <td ><img src="{{asset('assets/images/'.$test->icon)}}" class="avatar" alt="image"> {{$test->name}}</td>
                                            <td >{{$test->description}}</td>
                                            <td >{{$test->status==0 ? "Not-Available" : "Available" }}</td>
                                            <td >
                                                <form action="{{route('test.destroy',$test->id)}}" method="post">
                                                    <a class="btn btn-success" href="{{route('test.edit',$test->id)}}">Edit</a>
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
