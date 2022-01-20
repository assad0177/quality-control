@extends('layouts.master')
@section('content')
  <!-- Page Content -->
    <!-- Banner Starts Here -->

      <!-- Banner Ends Here -->

      <section class="single_plan">
        <div class="container thankyou">
          <div class="row">
            <div class="col-9">
              <div class="mb-5 single_plan-heading">
                <h2>Thankyou For Using Our Service</h2>

                <a href="{{route('client.login')}}" class="btn dark-hover">Login<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>

            </div>
            </div>
            {{-- <div class="plan_features col-3">
                <h3>Features Included</h3>
                <ul>
                    @foreach($plan->test as $test)
                        <li>{{$test->name }}</li>
                    @endforeach
                </ul>
            </div> --}}
          </div>
        </div>
        {{-- <a href="{{route('buyPlan',$plan->price)}}" style="margin-left:100px" class="btn mb-3 dark-hover">Buy Now <i class="fa fa-angle-double-right" aria-hidden="true"></i></a> --}}

      </section>

@endsection
