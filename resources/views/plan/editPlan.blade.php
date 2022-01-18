@extends('layouts.app')

@section('content')
<div class="row mt-3">
    <div class="col-12">
        <div class="card" style="border: none">
            <div class="mt-5" style=" text-align:center">
                <h1>Edit Plan</h1>
            </div>
            <div class="card-body">
                <form action="{{route('plan.update',$plan->id)}}" class="mt-3" method="post"  >
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div class="form-group input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Edit Name</span>
                                <input value="{{$plan->name}}" required type="text" placeholder="Enter Name" name="name"  id="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <div class="form-group input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Edit Description </span>
                                <input value="{{$plan->description}}" required type="text" placeholder="Enter Description" name="description"  id="description" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div class="form-group input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Edit Price</span>
                                <input value="{{$plan->price}}" required type="number" placeholder="Enter Price" name="price"  id="price" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <div class="form-group input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Edit No Of Operations </span>
                                <input value="{{$plan->no_of_operations}}" required type="number" placeholder="Enter No Of Operations" name="no_of_operations"  id="no_of_operations" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Choose Duration</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01"  id="duration" name="duration" >
                                    <option selected value="{{$plan->duration==0 ? "0" : "1"}}">{{$plan->duration==0 ? "Monthly" : "Yearly"}}</option>
                                    <option  value="{{$plan->duration==0 ? "1" : "0"}}">{{$plan->duration==0 ? "Yearly" : "Monthly"}}</option>                                </select>
                            </div>
                        </div>
                        <div class="col-6 mb-2 p0"  >
                            <div class="input-group">
                                <label  class="form-group input-group-text">Select Test</label>
                                <select id="test"   multiple name="tests[]"  class="p0 input-group-text form-select selectpicker">
                                @foreach ($tests as $test )
                                    <option  @if(in_array($test->id,$plan->selectedTests())) selected @endif   value="{{$test->id}}">{{$test->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                            <button  type="submit"  class="mt-3 btn btn-primary">Edit</button>
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
