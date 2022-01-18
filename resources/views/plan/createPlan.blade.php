@extends('layouts.app')

@section('content')
<div class="row mt-3">
    <div class="col-12">
        <div class="card" style="border: none">
            <div class="mt-5" style=" text-align:center">
                <h1>Add Plan</h1>
            </div>
            <div class="card-body">
                <form action="{{route('plan.store')}}" class="mt-3" method="post"  >
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div class="form-group input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Add Name</span>
                                <input required type="text" placeholder="Enter Name" name="name"  id="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <div class="form-group input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Add Description </span>
                                <input required type="text" placeholder="Enter Description" name="description"  id="description" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div class="form-group input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Add Price</span>
                                <input required type="number" placeholder="Enter Price" name="price"  id="price" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <div class="form-group input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Add No Of Operations </span>
                                <input required type="number" placeholder="Enter No Of Operations" name="no_of_operations"  id="no_of_operations" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Choose Duration</label>
                                </div>
                                <select class="custom-select" id="duration" name="duration">
                                  <option value="0">Monthly</option>
                                  <option value="1">Yearly</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6  mb-2 p0" >
                            <div class="input-group">
                                <label  class="form-group input-group-text">Select Test</label>
                                <select id="test" multiple name="tests[]" class=" p0 input-group-text form-select selectpicker">
                                    @foreach ($tests as $test )
                                        <option value="{{$test->id}}">{{$test->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class=" mt-3 btn btn-primary">Create </button>
                </form>
                @if ($errors->any())
                    <div class="mt-3 alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <a href="{{route('plan.index')}}"><button   type="button" class="mt-3 mb-3 btn btn-primary">Cancel</button></a>
            </div>
        </div>
    </div>
</div>

@endsection




