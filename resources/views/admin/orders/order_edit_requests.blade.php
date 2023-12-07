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
                                <a href="" class="text-muted">Order Edit Request List</a>
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
                    <h3 class="card-label">Order Edit Request List</h3>

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
                                <th>Comany Name</th>
                                <th>Type Of Business</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody id="clientOrderTbody">
                            @isset($allUpdateRequest)
                                @foreach ($allUpdateRequest as $all)
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
                                            @if ($all['status'] == 0)
                                                <span class="badge badge-danger">Not Approved</span>
                                            @else
                                                <span class="badge badge-success">Approved</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>

                    </table>


                    {{-- <nav id="tableList">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home"
                                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Comany &
                                Personal</button>

                            <button class="nav-link" id="nav-ordermanage-tab" data-toggle="tab"
                                data-target="#nav-ordermanage" type="button" role="tab" aria-controls="nav-ordermanage"
                                aria-selected="false">Order
                                Management</button>

                            <button class="nav-link" id="nav-compmanage-tab" data-toggle="tab" data-target="#nav-compmanage"
                                type="button" role="tab" aria-controls="nav-compmanage" aria-selected="false">Company
                                Management</button>
                            <button class="nav-link" id="nav-sharetype-tab" data-toggle="tab" data-target="#nav-sharetype"
                                type="button" role="tab" aria-controls="nav-sharetype" aria-selected="false">Share
                                Type</button>

                            <button class="nav-link" id="nav-renewal-tab" data-toggle="tab" data-target="#nav-renewal"
                                type="button" role="tab" aria-controls="nav-renewal" aria-selected="false">Agent
                                Renewal</button>
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <!--Personal Detail Table-->
                            <table class="table table-bordered table-hover table-checkable" id="clientOrderTable"
                                style="margin-top: 13px !important">
                                <thead>
                                    <tr>
                                        <th>Comany Name</th>
                                        <th>Type Of Business</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>


                                <tbody id="clientOrderTbody">
                                    @foreach ($order_updates as $order)
                                        @isset($order_updates)
                                            @foreach ($order->orderupdate as $orderUpdate)
                                                <tr>
                                                    <td>{{ $orderUpdate->company_name }}</td>
                                                    <td>{{ $orderUpdate->type_of_business }}</td>
                                                    <td>{{ $orderUpdate->first_name }}</td>
                                                    <td>{{ $orderUpdate->last_name }}</td>
                                                    <td>{{ $orderUpdate->email }}</td>
                                                    <td>{{ $orderUpdate->country }}</td>
                                                    <td>{{ $orderUpdate->phone_number }}</td>
                                                    <td>{{ $orderUpdate->city }}</td>
                                                    <td>{{ $orderUpdate->created_at }}</td>
                                                    <td>
                                                        @if ($orderUpdate->status == 0)
                                                            Pending
                                                        @else
                                                            Approved
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    @endforeach
                                </tbody>

                            </table>
                            <!--Personal Detail Table-->
                        </div>

                        <div class="tab-pane fade" id="nav-ordermanage" role="tabpanel"
                            aria-labelledby="nav-ordermanage-tab">
                            <!--Comany Managerment Table-->
                            <table class="table table-bordered table-hover table-checkable" id="clientOrderTable"
                                style="margin-top: 13px !important">
                                <thead>
                                    <tr>
                                        <th>Order Name</th>
                                        <th>Type</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>


                                <tbody id="clientOrderTbody">
                                    @foreach ($order_updates as $order)
                                        @isset($order_updates)
                                            @foreach ($order->managementupdate as $managementupdates)
                                                <tr>
                                                    <td>{{ $order->type_of_business }}</td>
                                                    <td>{{ $managementupdates->type }}</td>
                                                    <td>{{ $managementupdates->first_name }}</td>
                                                    <td>{{ $managementupdates->last_name }}</td>
                                                    <td>{{ $managementupdates->created_at }}</td>
                                                    <td>
                                                        @if ($managementupdates->status == 0)
                                                            Pending
                                                        @else
                                                            Approved
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    @endforeach
                                </tbody>

                            </table>
                            <!--Comany Managerment Table-->
                        </div>

                        <div class="tab-pane fade" id="nav-compmanage" role="tabpanel" aria-labelledby="nav-compmanage-tab">
                            <!--Comany Managerment Table-->
                            <table class="table table-bordered table-hover table-checkable" id="clientOrderTable"
                                style="margin-top: 13px !important">
                                <thead>
                                    <tr>
                                        <th>Order Name</th>
                                        <th>Type</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>


                                <tbody id="clientOrderTbody">
                                    @foreach ($order_updates as $order)
                                        @isset($order_updates)
                                            @foreach ($order->companymanagementupdate as $compmanage)
                                                <tr>
                                                    <td>{{ $order->type_of_business }}</td>
                                                    <td>{{ $compmanage->type }}</td>
                                                    <td>{{ $compmanage->first_name }}</td>
                                                    <td>{{ $compmanage->last_name }}</td>
                                                    <td>{{ $compmanage->created_at }}</td>
                                                    <td>
                                                        @if ($compmanage->status == 0)
                                                            Pending
                                                        @else
                                                            Approved
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    @endforeach
                                </tbody>

                            </table>
                            <!--Comany Managerment Table-->
                        </div>

                        <div class="tab-pane fade" id="nav-sharetype" role="tabpanel" aria-labelledby="nav-sharetype-tab">
                            <!--Share Type Table-->
                            <table class="table table-bordered table-hover table-checkable" id="clientOrderTable"
                                style="margin-top: 13px !important">
                                <thead>
                                    <tr>
                                        <th>Order Name</th>
                                        <th>Type</th>
                                        <th>Share Number</th>
                                        <th>Share Values</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>


                                <tbody id="clientOrderTbody">
                                    @foreach ($order_updates as $order)
                                        @isset($order_updates)
                                            @foreach ($order->shareupdate as $shareupdates)
                                                <tr>
                                                    <td>{{ $order->type_of_business }}</td>
                                                    <td>{{ $shareupdates->type }}</td>
                                                    <td>{{ $shareupdates->share_number }}</td>
                                                    <td>{{ $shareupdates->share_value }}</td>
                                                    <td>{{ $shareupdates->created_at }}</td>
                                                    <td>
                                                        @if ($shareupdates->status == 0)
                                                            Pending
                                                        @else
                                                            Approved
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    @endforeach
                                </tbody>

                            </table>
                            <!--Share Type Table-->
                        </div>

                        <div class="tab-pane fade" id="nav-renewal" role="tabpanel" aria-labelledby="nav-renewal-tab">
                            <!--Share Type Table-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-checkable" id="clientOrderTable"
                                    style="margin-top: 13px !important">
                                    <thead>
                                        <tr>
                                            <th>Order Name</th>
                                            <th>Cash</th>
                                            <th>Trade Notes & Accounts Receivable</th>
                                            <th>Subtract Allowance For Bad Debts</th>
                                            <th>(Accounts Receivable - Bed Debts)</th>
                                            <th>U.S Government Obligations</th>
                                            <th>Tax-Exempt Securities</th>
                                            <th>Other Current Assets</th>
                                            <th>Loans to Stockholders</th>
                                            <th>Mortgage & Real Estate Loans</th>
                                            <th>Other Investments</th>
                                            <th>Buildings</th>
                                            <th>Depietable Assets</th>
                                            <th>Land</th>
                                            <th>Intangible Assets</th>
                                            <th>Accumulated Amortization</th>
                                            <th>(Intangible Assets - Accumulated Amortization)</th>
                                            <th>Other Assets</th>
                                            <th>Total Assets </th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>


                                    <tbody id="clientOrderTbody">
                                        @foreach ($order_updates as $order)
                                            @isset($order_updates)
                                                @foreach ($order->renewalupdate as $renewalupdates)
                                                    <tr>
                                                        <td>{{ $order->type_of_business }}</td>
                                                        <td>{{ $renewalupdates->cash }}</td>
                                                        <td>{{ $renewalupdates->tradeNotesInput }}</td>
                                                        <td>{{ $renewalupdates->allowanceInput }}</td>
                                                        <td>{{ $renewalupdates->accountsReceivable }}</td>
                                                        <td>{{ $renewalupdates->governmentObligations }}</td>
                                                        <td>{{ $renewalupdates->securities }}</td>
                                                        <td>{{ $renewalupdates->currentAssets }}</td>
                                                        <td>{{ $renewalupdates->loans }}</td>
                                                        <td>{{ $renewalupdates->mortgage }}</td>
                                                        <td>{{ $renewalupdates->otherInvestments }}</td>
                                                        <td>{{ $renewalupdates->buildings }}</td>
                                                        <td>{{ $renewalupdates->depietableAssets }}</td>
                                                        <td>{{ $renewalupdates->land }}</td>
                                                        <td>{{ $renewalupdates->intangibleAssets }}</td>
                                                        <td>{{ $renewalupdates->accumulatedAmortization }}</td>
                                                        <td>{{ $renewalupdates->intangibleAmortization }}</td>
                                                        <td>{{ $renewalupdates->otherAssets }}</td>
                                                        <td>{{ $renewalupdates->totalAssetsValue }}</td>
                                                        <td>
                                                            @if ($renewalupdates->status == 0)
                                                                Pending
                                                            @else
                                                                Approved
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!--Share Type Table-->
                        </div>

                    </div> --}}


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


        });
    </script>
@endsection
