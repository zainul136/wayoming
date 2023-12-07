@extends('admin.layouts.master')
@section('title', $title)
@section('content')

    <style>
        #tableList .nav-tabs button {
            padding: 15px 30px;
            margin: 0px 10px;
        }

        .hilight {
            border: 1px solid green;
            border-radius: 20px;
            padding: 5px;
        }
    </style>
    <!--begin::Card-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader" kt-hidden-height="54" style="">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Order View Changes</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->

            </div>
        </div>
        <div class="card card-custom ">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon-users text-primary"></i>
                    </span>
                    <h3 class="card-label">Order View Changes</h3>

                    <div id="loading-indicator" style="display: none;">
                        Loading...
                    </div>

                </div>
                <div class="card-toolbar">

                    <!--begin::Button-->

                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                @include('admin.partials._messages')
                <div class="">

                    <h3 class="card-label">Personal Detais</h3>
                    <div style="border: 1px solid #c5c4c4; border-radius: 20px; padding: 12px;margin: 20px 0px;">
                        <div class="row">

                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>From First Name:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->first_name != $new->first_name)
                                            <p class="hilight">
                                                {{ $previous->first_name }}</p>
                                        @else
                                            <p>{{ $previous->first_name }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>From Last Name:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->last_name != $new->last_name)
                                            <p class="hilight">
                                                {{ $previous->last_name }}</p>
                                        @else
                                            <p>{{ $previous->last_name }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>From Email:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->email != $new->email)
                                            <p class="hilight">
                                                {{ $previous->email }}</p>
                                        @else
                                            <p>{{ $previous->email }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>From Country:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->country != $new->country)
                                            <p class="hilight">
                                                {{ $previous->country }}</p>
                                        @else
                                            <p>{{ $previous->country }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>From Phone Number:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->phone_number != $new->phone_number)
                                            <p class="hilight">
                                                {{ $previous->phone_number }}</p>
                                        @else
                                            <p>{{ $previous->phone_number }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>From Mailing Address:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->mailing_address != $new->mailing_address)
                                            <p class="hilight">
                                                {{ $previous->mailing_address }}</p>
                                        @else
                                            <p>{{ $previous->mailing_address }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>From Zip Code:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->zip_postal_code != $new->zip_postal_code)
                                            <p class="hilight">
                                                {{ $previous->zip_postal_code }}</p>
                                        @else
                                            <p>{{ $previous->zip_postal_code }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>From City:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->city != $new->city)
                                            <p class="hilight">
                                                {{ $previous->city }}</p>
                                        @else
                                            <p>{{ $previous->city }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>From State/Province:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->state_province != $new->state_province)
                                            <p class="hilight">
                                                {{ $previous->state_province }}</p>
                                        @else
                                            <p>{{ $previous->state_province }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>To First Name:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($new->first_name != $previous->first_name)
                                            <p class="hilight">
                                                {{ $new->first_name }}</p>
                                        @else
                                            <p>{{ $new->first_name }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>To Last Name:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($new->last_name != $previous->last_name)
                                            <p class="hilight">
                                                {{ $new->last_name }}</p>
                                        @else
                                            <p>{{ $new->last_name }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>To Email:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($new->email != $previous->email)
                                            <p class="hilight">
                                                {{ $new->email }}</p>
                                        @else
                                            <p>{{ $new->email }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>To Country:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($new->country != $previous->country)
                                            <p class="hilight">
                                                {{ $new->country }}</p>
                                        @else
                                            <p>{{ $new->country }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>To Phone Number:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($new->phone_number != $previous->phone_number)
                                            <p class="hilight">
                                                {{ $new->phone_number }}</p>
                                        @else
                                            <p>{{ $new->phone_number }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>To Mailing Address:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($new->mailing_address != $previous->mailing_address)
                                            <p class="hilight">
                                                {{ $new->mailing_address }}</p>
                                        @else
                                            <p>{{ $new->mailing_address }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>To Zip Code:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($new->zip_postal_code != $previous->zip_postal_code)
                                            <p class="hilight">
                                                {{ $new->zip_postal_code }}</p>
                                        @else
                                            <p>{{ $new->zip_postal_code }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>To City:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($new->city != $previous->city)
                                            <p class="hilight">
                                                {{ $new->city }}</p>
                                        @else
                                            <p>{{ $new->city }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>To State/Province:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($new->state_province != $previous->state_province)
                                            <p class="hilight">
                                                {{ $new->state_province }}</p>
                                        @else
                                            <p>{{ $new->state_province }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <h3 class="card-label">Company Detais</h3>
                    <div style="border: 1px solid #c5c4c4; border-radius: 20px; padding: 12px;margin: 20px 0px;">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>From Business Type:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->type_of_business != $new->type_of_business)
                                            <p class="hilight">
                                                {{ $previous->type_of_business }}</p>
                                        @else
                                            <p>{{ $previous->type_of_business }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>From Company Name:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->company_name != $new->company_name)
                                            <p class="hilight">
                                                {{ $previous->company_name }}</p>
                                        @else
                                            <p>{{ $previous->company_name }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>To Business Type:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->type_of_business != $new->type_of_business)
                                            <p class="hilight">
                                                {{ $new->type_of_business }}</p>
                                        @else
                                            <p>{{ $new->type_of_business }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>To Company Name:</h6>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($previous->company_name != $new->company_name)
                                            <p class="hilight">{{ $new->company_name }}</p>
                                        @else
                                            <p>{{ $new->company_name }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end::Card-->
@endsection
@section('stylesheets')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendors Styles-->
@endsection
@section('scripts')
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors-->
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
