@extends('layouts.app')

@section('content')
<div class="row mt-3">
    <div class="col-12">
        <div class="card" style="border: none">
            <div class="" style=" text-align:center">
                <h1>Add Test</h1>
            </div>
            <div class="card-body">
                <form action="{{route('test.store')}}" class="mt-3" method="post" enctype="multipart/form-data" >
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                </div>
                                <input type="text" name="name" id="name"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                              </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span  class="input-group-text">Description</span>
                                <input   type="text" required id="description" name="description"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Status</span>
                                <select class="form-select" id="status" name="status">
                                  <option selected value="1">Available</option>
                                  <option value="0">Not-Available</option>
                                </select>
                              </div>
                            </select>
                        </div>
                        {{-- <div class="col-6 mb-2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                              </div>
                        </div> --}}
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                  <input type="file" name="icon" id="icon"  class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                  <label class="custom-file-label" for="inputGroupFile03">Choose Icon file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            {{-- <div class="form-group input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Add Image </span>
                                <input required type="file" placeholder="Enter Image" name="image"  id="image" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div> --}}
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                  <input type="file" name="image" id="image"  class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                  <label class="custom-file-label" for="inputGroupFile03">Choose Image file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class=" mt-3 btn btn-primary">Add </button>
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

@endsection




