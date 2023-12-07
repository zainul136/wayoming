@extends('client.layouts.master')
@section('title', $title)
@section('content')

    <style>
        .dataTables_wrapper .dataTables_paginate .pagination .page-item.active>.page-link {
            background: #557D60;
            color: #ffffff;
        }

        .ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 105px;
            cursor: pointer;
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
                                <a href="" class="text-muted">Edit Request Approval Reject</a>
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
                    <h3 class="card-label">Edit Request Approval Reject</h3>

                </div>
                <div class="card-toolbar">

                    <!--begin::Button-->

                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                @include('admin.partials._messages')
                <div class="">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>Order Type</th>
                                <th>Company Name</th>
                                <th>Business Type</th>
                                <th>Status</th>
                                <th>Reason</th>
                            </tr>
                        </thead>

                        <tbody id="editRequestTable">
                            @isset($allUpdateRequest)
                                @foreach ($allUpdateRequest as $reject)
                                    <tr>
                                        <td>
                                            @if ($reject['order_type'] == 0)
                                                Start A Company
                                            @elseif ($reject['order_type'] == 1)
                                                Registered Agent
                                            @else
                                                Renewal
                                            @endif
                                        </td>
                                        <td>
                                            {{ $reject['company_name'] }}
                                        </td>
                                        <td>
                                            {{ $reject['type_of_business'] }}
                                        </td>
                                        <td>
                                            @if ($reject['status'] == 0)
                                                <span class="badge badge-danger">Not Approved</span>
                                            @else
                                                <span class="badge badge-success">Approved</span>
                                            @endif
                                        </td>
                                        <td class="resonShow" id="resonShow" data-id="{{ $reject['notapproved']['order_id'] ?? '' }}">
                                            @if ($reject['status'] == 0)
                                                <div class="ellipsis" id="ellipsis">
                                                    {{ $reject['notapproved']['reason'] ?? '' }}
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>

                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>


    <!-- View Reason Modal Start -->
    <div class="modal fade" id="showFullContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resson Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p id="full-content"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- View Reason Modal End -->

    <!--end::Card-->
@endsection
@section('stylesheets')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
@endsection
@section('scripts')
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors-->
    <script>
        $(document).ready(function() {

            $('#editRequestTable').on('click', '.resonShow', function() {

                var order_id = $(this).attr('data-id');

                // Make an Ajax request
                $.ajax({
                    url: '{{ route('client.get.content') }}',
                    type: 'GET',
                    data: {
                        order_id: order_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.ordersupdatedetail.status);

                        if (response.ordersupdatedetail.status === 0) {
                            $('#showFullContent').modal('show');
                            $('#full-content').html(response.reason);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors if the Ajax request fails
                        console.error(error);
                    }
                });
            });


        });
    </script>
@endsection
