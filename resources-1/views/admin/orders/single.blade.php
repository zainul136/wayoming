@extends('admin.layouts.master')
<?php
$setting = \App\Models\Setting::pluck('value', 'name')->toArray();
$auth_logo = isset($setting['auth_logo']) ? 'uploads/' . $setting['auth_logo'] : 'assets/media/logos/logo-light.png';
$auth_page_heading = isset($setting['auth_page_heading']) ? $setting['auth_page_heading'] : 'wwww.webexert.com';
$auth_image = isset($setting['auth_image']) ? 'uploads/' . $setting['auth_image'] : 'assets/media/svg/illustrations/login-visual-1.svg';
$agent_fixed_price = isset($setting['agent_fixed_price']) ? $setting['agent_fixed_price'] : '20.00';
$company_fixed_price = isset($setting['company_fixed_price']) ? $setting['company_fixed_price'] : '135.00';

$copy_right = isset($setting['copy_right']) ? $setting['copy_right'] : 'wwww.webexert.com';
$stripe_client = isset($setting['stripe_client']) ? $setting['stripe_client'] : 'pk_test_0EgBbBMGnb4kCquzWTPh6dKC00glHV9dZS';
?>
@section('title', $title)
@section('content')
    <style>
        /* Define the CSS rule to change the PDF icon size */
        .pdf-icon {
            font-size: 6rem;
            /* Adjust the size as needed */
        }

        .p_p {
            font-weight: 800;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
        }

    </style>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class=" subheader py-2 py-lg-6 subheader-solid" id="kt_subheader" kt-hidden-height="54" style="">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-print-none d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-print-none d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <!-- <h5 class=" text-dark font-weight-bold my-1 mr-5">Dashboard</h5> -->
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="" class="text-muted">Manage Orders</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                Order Details
                            </li>

                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom card-sticky" id="kt_page_sticky_card">
                    <div class="card-header" style="">
                        <div class="card-title">
                            {{-- <h3 class="card-label">Order Details
                                <i class="mr-2"></i>
                            </h3> --}}

                        </div>
                        <div class="d-print-none card-toolbar">
                            <a href="{{ route('orders.index') }}"
                                class="btn btn-light-primary
                        font-weight-bolder mr-2">
                                <i class="ki ki-long-arrow-back icon-sm"></i>Back
                            </a>
                            <button class="btn btn-primary" onClick="window.print()">Print this page</button>

                            <a href="" class="btn btn-primary font-weight-bolder ml-2" data-toggle="modal"
                                data-target="#orderDocumentModel">
                                <span class="svg-icon svg-icon-md">
                                </span>Upload Document
                            </a>





                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.partials._messages')
                        <!--begin::Form-->
                        {{ Form::model($user, ['method' => 'PATCH', 'route' => ['orders.update', $user->id], 'class' => 'form', 'id' => 'client_update_form', 'enctype' => 'multipart/form-data']) }}
                        @csrf


                        <h3 class="card-label">Personal Detais</h3>

                        <div style="border: 1px solid #c5c4c4; border-radius: 20px; padding: 12px;margin: 25px 0px;">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="p_p">First Name</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right">{{ $user->first_name }}</p>
                                        </div>

                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">Mailing Address</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right">{{ $user->mailing_address }}</p>
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">City</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right">{{ $user->city }}</p>
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">Country</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right">{{ $user->country }}</p>
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">Email</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right">{{ $user->email }}</p>
                                        </div>
                                        <div class="col-md-4"></div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="p_p">Last Name</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right">{{ $user->last_name }}</p>
                                        </div>

                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">Zip Postal Code</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right">{{ $user->zip_postal_code }}</p>
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">State Province</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right">{{ $user->state_province }}</p>
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">Phone Number</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right">{{ $user->phone_number }}</p>
                                        </div>
                                        <div class="col-md-4"></div>



                                    </div>
                                </div>
                            </div>

                        </div>



                        <h3 class="card-label">Company Overview</h3>

                        <div style="border: 1px solid #c5c4c4; border-radius: 20px; padding: 12px;margin: 25px 0px;">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <p class="p_p">Company Name</p>
                                        </div>
                                        <div class="col-md-5">
                                            <p class="align-right">{{ $user->company_name }}</p>
                                        </div>

                                        <div class="col-md-2"></div>

                                        <div class="col-md-5">
                                            <p class="p_p">Order Type</p>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="flex-container">
                                                <p class="align-right">
                                                    @if ($user->order_type == 1)
                                                        Registered Agent
                                                    @elseif ($user->order_type == 0)
                                                        Start A Company
                                                    @else
                                                        register-agent-renewal
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-2"></div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <p class="p_p">Type of Business</p>
                                        </div>
                                        <div class="col-md-5">
                                            <p class="align-right">{{ $user->type_of_business }}</p>
                                        </div>

                                        {{-- <div class="col-md-2"></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-label">Authorized Officials</h3>
                        <div class="row"
                            style="border: 1px solid #c5c4c4; border-radius: 20px; padding: 12px;margin: 25px 0px;">

                            <div class="col-md-12 mt-3">

                                {{-- for share type --}}
                                @if (count($user->sharetypes) > 0)
                                    <table class="table">
                                        <h3>Share Type</h3>
                                        <thead>
                                            <tr style="background: var(--primary-normal, #557D60); color: #fff;">
                                                <th>Type</th>
                                                <th>Share Number</th>
                                                <th>Share Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($user->sharetypes as $share)
                                                <tr>
                                                    <td>{{ $share->type }}</td>
                                                    <td>{{ $share->share_number }}</td>
                                                    <td>{{ $share->share_value }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif

                                {{-- for company management --}}
                                @if (count($user->compmanagment) > 0)
                                    <table class="table">
                                        <h3>Company Management</h3>
                                        <thead>
                                            <tr style="background: var(--primary-normal, #557D60); color: #fff;">
                                                <th>Type</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($user->compmanagment as $manag)
                                                <tr>
                                                    <td>{{ $manag->type }}</td>
                                                    <td>{{ $manag->first_name }}</td>
                                                    <td>{{ $manag->last_name }}</td>
                                                    <td>{{ $manag->address }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif

                                {{-- for management --}}
                                @if (count($user->managements) > 0)
                                    <table class="table">
                                        <h3>Management</h3>
                                        <thead>
                                            <tr style="background: var(--primary-normal, #557D60); color: #fff;">
                                                <th>Management</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Type Non-Profit</th>
                                                <th>Exempt Status</th>
                                                {{-- <th>Number Share</th>
                                        <th>Value Share</th> --}}
                                                <th>Address to Record with State</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($user->managements as $management)
                                                <tr>
                                                    <td>{{ $management->type }}</td>
                                                    <td>{{ $management->first_name }}</td>
                                                    <td>{{ $management->last_name }}</td>
                                                    <td>{{ $management->np_corp_type }}</td>
                                                    <td>{{ $management->np_exempt_status == 1 ? 'Yes' : 'No' }}</td>
                                                    {{-- <td>{{ $management->number_share }}</td>
                                            <td>{{ $management->value_share }}</td> --}}
                                                    <td>{{ $management->address_to_record_with_state }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif

                                {{-- for Service Items --}}
                                @if (count($user->orderitems) > 0)
                                    <table class="table">
                                        <h3>Service Items</h3>
                                        <thead>
                                            <tr style="background: var(--primary-normal, #557D60); color: #fff;">
                                                <th>Service Item</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($user->orderitems as $sitems)
                                                <tr>
                                                    <td>{{ $sitems->serviceitems->name }}</td>
                                                    <td>{{ $sitems->amount }}</td>
                                                    <td>{{ $sitems->description }}</td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @endif

                            </div>

                        </div>


                        @if (count($user->documents) > 0)
                            <h3 class="card-label">Company Documents</h3>
                            <div class="row"
                                style="border: 1px solid #c5c4c4; border-radius: 20px; padding: 12px;margin: 25px 0px;">

                                @foreach ($user->documents as $doc)
                                    <div class="col-md-3">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <i class="far fa-file-pdf pdf-icon"></i>
                                                </h5>
                                                <p class="card-text">Uploaded on: {{ $doc->created_at->format('M d, Y') }}
                                                </p>
                                                <a href="{{ asset($doc->document) }}" class="btn btn-primary"
                                                    target="_blank">Download</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endif


                        <div class="row">


                            {{-- <table class="table">
                                <tr>
                                    <th>First Name</th>
                                    <td>{{ $user->first_name }}</td>
                                </tr>
                                <tr>
                                    <td>Last name</td>
                                    <td>{{ $user->last_name }}</td>
                                </tr>

                                <tr>
                                    <td>MailingAddress</td>
                                    <td>{{ $user->mailing_address }}</td>
                                </tr>
                                <tr>
                                    <td>Zip Postal Code</td>
                                    <td>{{ $user->zip_postal_code }}</td>
                                </tr>

                                <tr>
                                    <td>City</td>
                                    <td>{{ $user->city }}</td>
                                </tr>
                                <tr>
                                    <td>StateProvince</td>
                                    <td>{{ $user->state_province }}</td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>{{ $user->country }}</td>
                                </tr>
                                <tr>
                                    <td>PhoneNumber</td>
                                    <td>{{ $user->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>AttorneyFirstName</td>
                                    <td>{{ $user->attorney_first_name }}</td>
                                </tr>
                                <tr>
                                    <td>AttorneyLastName</td>
                                    <td>{{ $user->attorney_last_name }}</td>
                                </tr>
                                <tr>
                                    <td>AttorneyMailingAddress</td>
                                    <td>{{ $user->attorney_mailing_address }}</td>
                                </tr>
                                <tr>
                                    <td>CompanyName</td>
                                    <td>{{ $user->company_name }}</td>
                                </tr>
                                <tr>
                                    <td>Type of Business</td>
                                    <td>{{ $user->type_of_business }}</td>
                                </tr>

                                <tr>
                                    <td>Order Type</td>
                                    <td>{{ $user->order_type == 1 ? 'Registered Agent' : 'Start A Company' }}</td>
                                </tr>

                                <tr>
                                    <th>Payment Status</th>
                                    <td>
                                        @if ($user->payment_status == 1)
                                            <label class="label label-success label-inline mr-2">Paid</label>
                                        @elseif($user->payment_status == 0)
                                            <label class="label label-info label-inline mr-2">Payment is pending</label>
                                        @elseif($user->payment_status == 2)
                                            <label class="label label-danger label-inline mr-2">Cancel</label>
                                        @endif
                                    </td>
                                </tr>

                            </table> --}}

                            {{-- <table class="table">
                                <thead>
                                    <tr class="bg-light-info">
                                        <th>Item Detail</th>
                                        <th>Quantity</th>
                                        <th>price</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->items as $item)
                                        <tr>

                                            <td>{{ $item->Description }}</td>
                                            <td>{{ 1 }}</td>
                                            <td>${{ $item->amount }}</td>
                                            <td>${{ round($item->amount, 2) }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>

                                <tr class="bg-light-info">
                                    <th colspan="3">Fixed Price</th>
                                    @if ($user->order_type == 1)
                                        <td>${{ $agent_fixed_price }}</td>
                                    @elseif($user->order_type == 0)
                                        <td>${{ $company_fixed_price }}</td>
                                    @endif

                                </tr>

                                <tfoot>
                                    <tr class="bg-light-success">
                                        <th colspan="3">Total</th>
                                        <td>${{ round($user->total, 2) }}</td>
                                    </tr>
                                </tfoot>

                            </table> --}}

                            {{-- for Service Items --}}
                            {{-- <table class="table">
                                <h3>Service Items</h3>
                                <thead>
                                    <tr class="bg-light-info">
                                        <th>Service Item</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($user->orderitems as $sitems)
                                        <tr>
                                            <td>{{ $sitems->serviceitems->name }}</td>
                                            <td>{{ $sitems->amount }}</td>
                                            <td>{{ $sitems->description }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table> --}}



                        </div>

                        <hr>

                        {{-- for documenrt --}}
                        {{-- <h3>Documents</h3>
                        <div class="row mt-4">
                            @foreach ($user->documents as $doc)
                                <div class="col-md-3">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <i class="far fa-file-pdf pdf-icon"></i>
                                            </h5>
                                            <p class="card-text">Uploaded on: {{ $doc->created_at->format('M d, Y') }}</p>
                                            <a href="{{ asset($doc->document) }}" class="btn btn-primary"
                                                target="_blank">Download</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}

                        {{ Form::close() }}
                        <!--end::Form-->
                    </div>

                    <!-- Modal-->
                    <div class="modal fade" id="orderDocumentModel" data-backdrop="static" tabindex="-1"
                        role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Add Document</h4>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('admin.store.document') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="order_id" value="{{ $user->id }}">

                                        <div class="form-group">
                                            <label for="">Document</label>
                                            <input type="file" name="document" class="form-control" required>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close</button>

                                    <button type="submit" class="btn btn-primary font-weight-bold" style="background: #557D60; color: white;">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end::Card-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
@section('scripts')
    <script !src="">
        $("#status").change(function() {
            $("#client_update_form").submit();
        });

        function printDiv() {

            var divToPrint = document.getElementById('DivIdToPrint');

            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table th, table td {' +
                'border:1px solid #000;' +
                'padding;0.5em;' +
                '}' +
                '</style>';
            htmlToPrint += divToPrint.outerHTML;
            newWin = window.open("");
            // newWin.document.write("<h3 align='center'>Print Page</h3>");
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
        }
    </script>
@endsection
