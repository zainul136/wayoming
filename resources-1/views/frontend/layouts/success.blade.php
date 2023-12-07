@extends("frontend.layouts.master")

@section("content")

    <main class="d-flex flex-column justify-content-start flex-grow-1 ">

        <!-- Start-->
        <div class="content_section section_space">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 text-center">
                        <i class="far fa-check-circle fa-6x text-success"></i>
                        <h1 class="mb-3 text-success">Thank You!</h1>

                        @include("client.partials._messages")

                        <!-- <p class="page_sub_title mb-0">Your Submission has been sent</p> -->
                        <a href="{{url('/')}}" class="btn btn-primary px-4 mt-5">Home</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End-->

    </main>

  @endsection
  

