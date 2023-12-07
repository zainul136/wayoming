@extends('admin.layouts.master')
@section('title', $title)
@section('content')
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
                                <a href="" class="text-muted">Order Request</a>
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
                    <h3 class="card-label">Order Request List</h3>

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
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="clientOrderTable"
                        style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>


                        <tbody id="clientOrderTbody">
                            @isset($order_requests)
                                @foreach ($order_requests as $req)
                                    @foreach ($history[$loop->index] as $order_history)
                                        <tr>
                                            <td><strong>From:-</strong>{{ $order_history->company_name }}
                                                <strong>To:-</strong>{{ $req->company_name }}
                                            </td>
                                            <td><strong>From:-</strong>{{ $order_history->first_name }}
                                                <strong>To:-</strong>{{ $req->first_name }}
                                            </td>
                                            <td><strong>From:-</strong>{{ $order_history->last_name }}
                                                <strong>To:-</strong>{{ $req->last_name }}
                                            </td>
                                            <td><strong>From:-</strong>{{ $order_history->email }}
                                                <strong>To:-</strong>{{ $req->email }}
                                            </td>
                                            <td><strong>From:-</strong>{{ $order_history->country }}
                                                <strong>To:-</strong>{{ $req->country }}
                                            </td>
                                            <td><strong>From:-</strong>{{ $order_history->phone_number }}
                                                <strong>To:-</strong>{{ $req->phone_number }}
                                            </td>
                                            <td><strong>From:-</strong>{{ $order_history->city }}
                                                <strong>To:-</strong>{{ $req->city }}
                                            </td>
                                            <td>{{ $req->created_at }}</td>
                                            <td>
                                                @if ($req->status == 0)
                                                    <span class="label label-info label-inline mr-2">Pending</span>
                                                @else
                                                    <span class="label label-success label-inline mr-2">Approved</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-clean btn-icon dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fi fi-br-menu-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item btn-approve" href="#"
                                                            data-id="{{ $req->id }}" data-action="approve">
                                                            <i class="flaticon-check"></i> Approve
                                                        </a>
                                                        <a class="dropdown-item btn-reject" href="#"
                                                            data-id="{{ $req->id }}" data-action="reject">
                                                            <i class="flaticon-cross"></i> Reject
                                                        </a>
                                                        <!-- Other dropdown items can be added here -->
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endisset
                        </tbody>

                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>
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

            $('#clientOrderTbody').on('click', '.btn-approve, .btn-reject', function(e) {
                e.preventDefault();

                var id = $(this).data("id");
                var action = $(this).data("action");

                var button = $(this); // Store the button element
                /// Store the original button text
                var originalButtonText = button.html();

                // Change the button text to "Waiting..."
                button.html('<i class="spinner-border spinner-border-sm" role="status"></i> Waiting...')
                    .prop('disabled', true);

                $.ajax({
                    url: '{{ route('admin.request.approved') }}',
                    type: 'get',
                    async: false,
                    dataType: 'json',
                    data: {
                        id: id,
                        action: action
                    },
                    success: function(response) {

                        // Hide loading indicator on success
                        $('#loading-indicator').hide();

                        if (response.status == 200) {
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    },
                    error: function() {
                        // Hide loading indicator on success
                        $('#loading-indicator').hide();
                        alert('Something went wrong');
                    },
                    complete: function() {
                        // Change button text back to the original text
                        button.html(originalButtonText).prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
