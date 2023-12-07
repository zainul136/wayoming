@extends('admin.layouts.master')
@section('title', $title)
@section('content')

    <style>
        #tableList .nav-tabs button {
            padding: 15px 30px;
            margin: 0px 10px;
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
                                <a href="" class="text-muted">Order Edit Not Approved</a>
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
                    <h3 class="card-label">Order Edit Not Approved</h3>

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


                    <table class="table table-bordered table-hover table-checkable" id="clientOrderTable"
                           style="margin-top: 13px !important">
                        <thead>
                        <tr>
                            <th>Order Type</th>
                            <th>Company Name</th>
                            <th>Type Of Business</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                        </thead>

                        <tbody id="clientOrderTbody">
                        @isset($rejectsUpdateRequest)
                            @foreach ($rejectsUpdateRequest as $all)
                                <tr>
                                    <td>
                                        @if ($all['order_type'] == 0)
                                            Start A Company
                                        @elseif ($all['order_type'] == 1)
                                            Registered Agent
                                        @else
                                            Renewal
                                        @endif
                                    </td>
                                    <td>{{ $all['company_name'] }}</td>
                                    <td>{{ $all['type_of_business'] }}</td>
                                    <td>{{ $all['first_name'] }}</td>
                                    <td>{{ $all['last_name'] }}</td>
                                    <td>{{ $all['country'] }}</td>
                                    <td>{{ $all['city'] }}</td>
                                    <td>

                                            <span class="badge badge-danger">Not Approved</span>

                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                        </tbody>

                    </table>

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
