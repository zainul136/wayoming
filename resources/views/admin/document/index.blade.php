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
                                <a href="" class="text-muted">Document</a>
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
                    <h3 class="card-label">Documents List</h3>
                </div>
                <div class="card-toolbar">
                </div>
            </div>
            <div class="card-body">
                @include('admin.partials._messages')
                <div class="">
                    <form action="{{ route('admin.delete-selected-orders') }}" method="post" id="client_form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" style="margin-top: 13px !important">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th class="text-center">Order Number</th>
                                    <th>Created At</th>
                                    <th>Document</th>
                                </tr>
                            </thead>

                            <tbody>
                                @isset($documents)
                                    @foreach ($documents as $doc)
                                        <tr>
                                            <td>{{ $doc->order->user->name }}</td>
                                            <td class="text-center">{{ $doc->order->id }}</td>
                                            <td>{{ $doc->created_at }}</td>
                                            <td>
                                                <a href="{{ asset($doc->document) }}" target="_blank">{{ $doc->document }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>

                        </table>
                    </form>
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
        $(document).on('click', 'th input:checkbox', function() {

        });
    </script>
@endsection
