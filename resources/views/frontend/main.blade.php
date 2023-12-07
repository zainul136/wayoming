@extends("frontend.layouts.master")

@section("content")
<main class="d-flex flex-column justify-content-start flex-grow-1 ">

    <!-- Start-->
    <div class="content_section section_space">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12 text-center">
                    @include("client.partials._messages")
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End-->

</main>
@endsection