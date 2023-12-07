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
            padding: 0px 13px;
        }

        .dropdown-toggle {
            width: 100% !important;
            font-size: 12px !important;
            padding: 5px !important;
        }

        .inner_row {
            padding: 10px 0px;
        }

        .gap-row {
            margin: 10px 0;
        }

        .heading {
            margin: 15px 75px -10px;
            width: 100%;
            background: #557D60;
            color: #ffffff;
            border-radius: 6px;
            padding: 11px 15px;
        }

        .heading1 {
            margin: 15px 85px -10px;
            width: 100%;
            background: #557D60;
            color: #ffffff;
            border-radius: 6px;
            padding: 11px 15px;
        }

        .btn_not_approve {
            background: #557D60 !important;
            color: #ffffff !important;
            border: 0px !important;
        }

        .from_row::after {
            content: "";
            display: block;
            width: 100%;
            border-bottom: 1px solid gray;
            /* Customize the line's style as needed */
            margin-top: 5px;
            /* Adjust the margin to control the spacing between the line and the row */
        }

        .btn-approve {
            display: inline-block;
            margin-right: 10px;
            /* Add margin for spacing between the buttons */
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

                    @if (
                        $data['order_previous']->orderupdate->count() > 0 ||
                            $data['order_previous']->companymanagementupdate->count() ||
                            $data['order_previous']->shareupdate->count() > 0 ||
                            $data['order_previous']->managementupdate->count() > 0 ||
                            $data['order_previous']->renewalupdate->count() > 0)
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-4">
                                    <a style="background: #557D60; color: #ffff;" class="btn btn-default float-right"
                                        data-toggle="modal" data-target="#notApprovedModal" href="javascript:void(0)">
                                        <i class="flaticon-check"></i> Not Approved
                                    </a>
                                    <a style="background: #557D60; color: #ffff;"
                                        class="btn btn-default float-right btn-approve" id="approveButton"
                                        href="javascript:void(0)">
                                        <i class="flaticon-check"></i> Approved
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Personal Details Start --}}
                    @if ($data['order_previous']->orderupdate->count() > 0)
                        <div class="row">
                            <h5 class="font-weight-bold heading">Personal Details</h5>
                        </div>

                        <input type="hidden" name="order_id" value="{{ $data['order_previous']->id }}"
                            data-id="{{ $data['order_previous']->id }}" data-personal="personal">
                        <input type="hidden" name="cmanage" data-cmanage="cmanage">
                        <input type="hidden" name="sharetype" data-sharetype="sharetype">
                        <input type="hidden" name="omanage" data-omanage="omanage">
                        <input type="hidden" name="renewal" data-renewal="renewal">

                        <div class="row justify-content-center">
                            {{-- Left Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                {{-- first name --}}
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;First Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->first_name }}</span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Last Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->last_name }}</span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Email:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->email }}</span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Country:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->country }}</span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Phone:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->phone_number }}</span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Mailing Address:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->mailing_address }}</span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Zip/Postal:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->zip_postal_code }}</span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;City:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->city }}</span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;State Province:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->state_province }}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- Left Side End --}}


                            {{-- Right Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                {{-- first name --}}
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;First Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->first_name != $data['order_new']->first_name)
                                            <span class="hilight">{{ $data['order_new']->first_name }}</span>
                                        @else
                                            <span>{{ $data['order_new']->first_name }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;last Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->last_name != $data['order_new']->last_name)
                                            <span class="hilight">{{ $data['order_new']->last_name }}</span>
                                        @else
                                            <span>{{ $data['order_new']->last_name }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Email:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->email != $data['order_new']->email)
                                            <span class="hilight">{{ $data['order_new']->email }}</span>
                                        @else
                                            <span>{{ $data['order_new']->email }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Country:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->country != $data['order_new']->country)
                                            <span class="hilight">{{ $data['order_new']->country }}</span>
                                        @else
                                            <span>{{ $data['order_new']->country }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Phone:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->phone_number != $data['order_new']->phone_number)
                                            <span class="hilight">{{ $data['order_new']->phone_number }}</span>
                                        @else
                                            <span>{{ $data['order_new']->phone_number }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Mailing Address:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->mailing_address != $data['order_new']->mailing_address)
                                            <span class="hilight">{{ $data['order_new']->mailing_address }}</span>
                                        @else
                                            <span>{{ $data['order_new']->mailing_address }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Zip/Postal:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->zip_postal_code != $data['order_new']->zip_postal_code)
                                            <span class="hilight">{{ $data['order_new']->zip_postal_code }}</span>
                                        @else
                                            <span>{{ $data['order_new']->zip_postal_code }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;City:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->city != $data['order_new']->city)
                                            <span class="hilight">{{ $data['order_new']->city }}</span>
                                        @else
                                            <span>{{ $data['order_new']->city }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;State/Province:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->state_province != $data['order_new']->state_province)
                                            <span class="hilight">{{ $data['order_new']->state_province }}</span>
                                        @else
                                            <span>{{ $data['order_new']->state_province }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- Right Side End --}}
                        </div>
                        {{-- Personal Details End --}}


                        {{-- Company Details Start --}}
                        <div class="row">
                            <h5 class="font-weight-bold heading">Company Details</h5>
                        </div>
                        <div class="row justify-content-center">
                            {{-- Left Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                {{-- first name --}}
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Company Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->company_name }}</span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Type Of Business:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->type_of_business }}</span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Order Type:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->order_type == 0)
                                            Start A Company
                                        @elseif ($data['order_previous']->order_type == 1)
                                            Registered Agent
                                        @else
                                            Renewal
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- Left Side End --}}


                            {{-- Right Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                {{-- first name --}}
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Company Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->company_name != $data['order_new']->company_name)
                                            <span class="hilight">{{ $data['order_new']->company_name }}</span>
                                        @else
                                            <span>{{ $data['order_new']->company_name }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Type Of Business:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->type_of_business != $data['order_new']->type_of_business)
                                            <span class="hilight">{{ $data['order_new']->type_of_business }}</span>
                                        @else
                                            <span>{{ $data['order_new']->type_of_business }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Order Type:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_new']->order_type == 0)
                                            <span> Start A Company</span>
                                        @elseif ($data['order_new']->order_type == 1)
                                            <span>Registered Agent</span>
                                        @else
                                            Renewal
                                        @endif
                                    </div>
                                </div>

                            </div>
                            {{-- Right Side End --}}
                        </div>
                    @endif
                    {{-- Company Details End --}}



                    {{-- Company Management Start --}}
                    @if ($data['order_previous']->companymanagementupdate->count() > 0)
                        <div class="row">
                            <h5 class="font-weight-bold heading">Company Management</h5>
                        </div>
                        <div class="row justify-content-center">
                            {{-- Left Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                {{-- first name --}}
                                @foreach ($data['order_previous']->compmanagment as $from)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $from->type }}</span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;First Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $from->first_name }}</span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Last Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $from->last_name }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- Left Side End --}}


                            {{-- Right Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                {{-- first name --}}
                                @foreach ($data['order_previous']->companymanagementupdate as $to)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $to->type }}</span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;First Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                $isDifferent = true;
                                            @endphp

                                            @foreach ($data['order_previous']->compmanagment as $from)
                                                @if ($from->first_name === $to->first_name)
                                                    @php
                                                        $isDifferent = false;
                                                    @endphp
                                                @endif
                                            @endforeach

                                            @if ($isDifferent)
                                                <span class="hilight">{{ $to->first_name }}</span>
                                            @else
                                                <span>{{ $to->first_name }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Last Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                $isDifferent = true;
                                            @endphp

                                            @foreach ($data['order_previous']->compmanagment as $from)
                                                @if ($from->last_name === $to->last_name)
                                                    @php
                                                        $isDifferent = false;
                                                    @endphp
                                                @endif
                                            @endforeach

                                            @if ($isDifferent)
                                                <span class="hilight">{{ $to->last_name }}</span>
                                            @else
                                                <span>{{ $to->last_name }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            {{-- Right Side End --}}
                        </div>
                    @endif
                    {{-- Company Management End --}}


                    {{-- Share Type Start --}}
                    @if ($data['order_previous']->shareupdate->count() > 0)
                        <div class="row">
                            <h5 class="font-weight-bold heading">Share Type</h5>
                        </div>
                        <div class="row justify-content-center">

                            {{-- Left Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                {{-- first name --}}
                                @foreach ($data['order_previous']->sharetypes as $from)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $from->type }}</span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Share Number:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $from->share_number }}</span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Share Value:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $from->share_value }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- Left Side End --}}


                            {{-- Right Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                {{-- first name --}}
                                @foreach ($data['order_previous']->shareupdate as $to)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $to->type }}</span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Share Number:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                $isDifferent = true;
                                            @endphp

                                            @foreach ($data['order_previous']->sharetypes as $from)
                                                @if ($from->share_number === $to->share_number)
                                                    @php
                                                        $isDifferent = false;
                                                    @endphp
                                                @endif
                                            @endforeach

                                            @if ($isDifferent)
                                                <span class="hilight">{{ $to->share_number }}</span>
                                            @else
                                                <span>{{ $to->share_number }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Share Value:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                $isDifferent = true;
                                            @endphp

                                            @foreach ($data['order_previous']->sharetypes as $from)
                                                @if ($from->share_value === $to->share_value)
                                                    @php
                                                        $isDifferent = false;
                                                    @endphp
                                                @endif
                                            @endforeach

                                            @if ($isDifferent)
                                                <span class="hilight">{{ $to->share_value }}</span>
                                            @else
                                                <span>{{ $to->share_value }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            {{-- Right Side End --}}
                        </div>
                    @endif
                    {{-- Share Type End --}}


                    {{-- Order Management Start --}}
                    @if ($data['order_previous']->managementupdate->count() > 0)
                        <div class="row">
                            <h5 class="font-weight-bold heading">Order Management</h5>
                        </div>
                        <div class="row justify-content-center">

                            {{-- Left Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                {{-- first name --}}
                                @foreach ($data['order_previous']->managements as $from)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $from->type }}</span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;First Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $from->first_name }}</span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Last Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $from->last_name }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- Left Side End --}}


                            {{-- Right Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                {{-- first name --}}
                                @foreach ($data['order_previous']->managementupdate as $to)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span>{{ $to->type }}</span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;First Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                $isDifferent = true;
                                            @endphp

                                            @foreach ($data['order_previous']->managements as $from)
                                                @if ($from->first_name === $to->first_name)
                                                    @php
                                                        $isDifferent = false;
                                                    @endphp
                                                @endif
                                            @endforeach

                                            @if ($isDifferent)
                                                <span class="hilight">{{ $to->first_name }}</span>
                                            @else
                                                <span>{{ $to->first_name }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Last Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                $isDifferent = true;
                                            @endphp

                                            @foreach ($data['order_previous']->managements as $from)
                                                @if ($from->last_name === $to->last_name)
                                                    @php
                                                        $isDifferent = false;
                                                    @endphp
                                                @endif
                                            @endforeach

                                            @if ($isDifferent)
                                                <span class="hilight">{{ $to->last_name }}</span>
                                            @else
                                                <span>{{ $to->last_name }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            {{-- Right Side End --}}
                        </div>
                    @endif
                    {{-- Order Management End --}}


                    {{-- Ageent Renewal Start --}}
                    @if ($data['order_previous']->renewalupdate->count() > 0)
                        <div class="row">
                            <h5 class="font-weight-bold heading">Ageent Renewal</h5>
                        </div>
                        <div class="row justify-content-center">
                            {{-- Left Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                {{-- first name --}}
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Cash:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->cash }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;TradeNotesInput:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->tradeNotesInput }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;AllowanceInput:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->allowanceInput }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;AccountsReceivable:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->accountsReceivable }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;governmentObligations:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->governmentObligations }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Securities:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->securities }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;CurrentAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->currentAssets }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Loans:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->loans }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Mortgage:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->mortgage }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;OtherInvestments:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->otherInvestments }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Buildings:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->buildings }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;DepietableAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->depietableAssets }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Land:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->land }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;IntangibleAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->intangibleAssets }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;AccumulatedAmortization:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->accumulatedAmortization }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;IntangibleAmortization:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->intangibleAmortization }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;OtherAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->otherAssets }}</span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;TotalAssetsValue:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>{{ $data['order_previous']->agentrenewal->totalAssetsValue }}</span>
                                    </div>
                                </div>

                            </div>
                            {{-- Left Side End --}}


                            {{-- Right Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                {{-- first name --}}
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Cash:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->cash != $data['order_new_renewal']->cash)
                                            <span class="hilight">{{ $data['order_new_renewal']->cash }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->cash }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;TradeNotesInput:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->tradeNotesInput != $data['order_new_renewal']->tradeNotesInput)
                                            <span class="hilight">{{ $data['order_new_renewal']->tradeNotesInput }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->tradeNotesInput }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;AllowanceInput:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->allowanceInput != $data['order_new_renewal']->allowanceInput)
                                            <span class="hilight">{{ $data['order_new_renewal']->allowanceInput }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->allowanceInput }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;accountsReceivable:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->accountsReceivable != $data['order_new_renewal']->accountsReceivable)
                                            <span
                                                class="hilight">{{ $data['order_new_renewal']->accountsReceivable }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->accountsReceivable }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;GovernmentObligations:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->governmentObligations != $data['order_new_renewal']->governmentObligations)
                                            <span
                                                class="hilight">{{ $data['order_new_renewal']->governmentObligations }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->governmentObligations }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Securities:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->securities != $data['order_new_renewal']->securities)
                                            <span class="hilight">{{ $data['order_new_renewal']->securities }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->securities }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;CurrentAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->currentAssets != $data['order_new_renewal']->currentAssets)
                                            <span class="hilight">{{ $data['order_new_renewal']->currentAssets }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->currentAssets }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Loans:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->loans != $data['order_new_renewal']->loans)
                                            <span class="hilight">{{ $data['order_new_renewal']->loans }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->loans }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Mortgage:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->mortgage != $data['order_new_renewal']->mortgage)
                                            <span class="hilight">{{ $data['order_new_renewal']->mortgage }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->mortgage }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;OtherInvestments:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->otherInvestments != $data['order_new_renewal']->otherInvestments)
                                            <span
                                                class="hilight">{{ $data['order_new_renewal']->otherInvestments }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->otherInvestments }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Buildings:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->buildings != $data['order_new_renewal']->buildings)
                                            <span class="hilight">{{ $data['order_new_renewal']->buildings }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->buildings }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;DepietableAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->depietableAssets != $data['order_new_renewal']->depietableAssets)
                                            <span
                                                class="hilight">{{ $data['order_new_renewal']->depietableAssets }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->depietableAssets }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Land:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->land != $data['order_new_renewal']->land)
                                            <span class="hilight">{{ $data['order_new_renewal']->land }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->land }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;IntangibleAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->intangibleAssets != $data['order_new_renewal']->intangibleAssets)
                                            <span
                                                class="hilight">{{ $data['order_new_renewal']->intangibleAssets }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->intangibleAssets }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;AccumulatedAmortization:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if (
                                            $data['order_previous']->agentrenewal->accumulatedAmortization !=
                                                $data['order_new_renewal']->accumulatedAmortization)
                                            <span
                                                class="hilight">{{ $data['order_new_renewal']->accumulatedAmortization }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->accumulatedAmortization }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;IntangibleAmortization:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->intangibleAmortization != $data['order_new_renewal']->intangibleAmortization)
                                            <span
                                                class="hilight">{{ $data['order_new_renewal']->intangibleAmortization }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->intangibleAmortization }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;OtherAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->otherAssets != $data['order_new_renewal']->otherAssets)
                                            <span class="hilight">{{ $data['order_new_renewal']->otherAssets }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->otherAssets }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;TotalAssetsValue:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($data['order_previous']->agentrenewal->totalAssetsValue != $data['order_new_renewal']->totalAssetsValue)
                                            <span
                                                class="hilight">{{ $data['order_new_renewal']->totalAssetsValue }}</span>
                                        @else
                                            <span>{{ $data['order_new_renewal']->totalAssetsValue }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            {{-- Right Side End --}}
                        </div>
                    @endif
                    {{-- Ageent Renewal End --}}

                </div>
            </div>
        </div>
    </div>


    <!-- Not Approved Modal Start -->
    <div class="modal fade" id="notApprovedModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resson</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.approval.reject') }}" method="POST">

                    @csrf

                    <input type="hidden" name="order_id" value="{{ $data['order_previous']->id }}">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Describe Reason</label>
                            <textarea name="reason" class="form-control" cols="30" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn_not_approve">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Not Approved Modal End -->

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
        var csrfToken = "{{ csrf_token() }}";
    </script>

    <script>
        $(document).ready(function() {

            $('#approveButton').on('click', function() {

                $('.btn-approve').text('Waiting...');
                $('.btn-approve').prop('disabled', true);

                var order_id = $("input[name='order_id']").attr('data-id');
                var personal = $("input[name='order_id']").attr('data-personal');
                var omanage = $("input[name='omanage']").attr('data-omanage');
                var sharetype = $("input[name='sharetype']").attr('data-sharetype');
                var cmanage = $("input[name='cmanage']").attr('data-cmanage');
                var renewal = $("input[name='renewal']").attr('data-renewal');


                $.ajax({
                    type: 'GET', // Adjust the HTTP method as needed
                    url: '{{ route('admin.request.approved.personal') }}',
                    data: {
                        order_id: order_id,
                        personal: personal,
                        omanage: omanage,
                        sharetype: sharetype,
                        cmanage: cmanage,
                        renewal: renewal,
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);

                            $('.btn-approve').text('Approved');
                            $('.btn-approve').prop('disabled', false);
                        }

                        if (response.error) {
                            $('.btn-approve').text('Approved');
                            $('.btn-approve').prop('disabled', false);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        $('.btn-approve').text('Approved');
                        $('.btn-approve').prop('disabled', false);
                    }
                });

            });

        });
    </script>
@endsection
