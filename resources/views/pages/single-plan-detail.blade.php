@extends('layouts.master')
@section('content')
  <!-- Page Content -->
    <!-- Banner Starts Here -->
    @include('partials.banner')

      <!-- Banner Ends Here -->

      <section class="single_plan">
        <div class="container">
          <div class="row">
            <div class="col-9">
              <div class="single_plan-heading">
                <h2>Description</h2>
              </div>
              <div class="single_plan-text">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                  molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                  numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                  optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                  obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                  nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
                  tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,
                  quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos
                  sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam
                  recusandae alias error harum maxime adipisci amet laborum. Perspiciatis
                  minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit
                  quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur
                  fugiat, temporibus enim commodi iusto libero magni deleniti quod quam
                  consequuntur! Commodi minima excepturi repudiandae velit hic maxime
                  doloremque.
                </p>
              </div>
            </div>
            <div class="plan_features col-3">
                <h3>Features Included</h3>
                <ul>
                    @foreach($plan->test as $test)
                        <li>{{$test->name }}</li>
                    @endforeach
                </ul>
            </div>
          </div>
        </div>
        <a href="{{route('buyPlan',$plan->id)}}" style="margin-left:100px" class="btn mb-3 dark-hover">Buy Now <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>

      </section>

@endsection
