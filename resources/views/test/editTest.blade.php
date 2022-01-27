@extends('layouts.app')

@section('content')
<div cl ass="container-fluid bg-white rounded shadow p-5 mb-4 mt-4 ">
    <div class="row">
        <div class="col-12">
            <div class="card" style="border: none">
                <div class="mt-5" style=" text-align:center">
                    <h1>Edit Test</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('test.update',$test->id)}}" class="mt-3" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                    </div>
                                    <input type="text" name="name" value="{{$test->name}}" id="name"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span  class="input-group-text">Description</span>
                                    <input   type="text" value="{{$test->description}}" required id="description" name="description"  class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Status</span>
                                    <select class="form-select" id="status" name="status">
                                    <option selected value="{{$test->status==0 ? 0 : 1}}">{{$test->status==0 ? "Availabe" : "Not-Availabe"  }}</option>
                                    <option value="{{$test->status==0 ? 1 : 0}}">{{$test->status==0 ? "Not-Available" : "Available"}}</option>
                                    </select>
                                </div>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" value="{{asset($test->icon)}}" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">{{($test->icon)}}</label>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group mb-3">
                                            <input type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class=" mt-3 btn btn-primary">Update </button>
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
                    <a href="{{route('test.index')}}"><button   type="button" class="mt-3 mb-3 btn btn-primary">Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




