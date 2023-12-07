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

        .from_row::after {
            content: "";
            display: block;
            width: 100%;
            border-bottom: 1px solid gray;
            /* Customize the line's style as needed */
            margin-top: 5px;
            /* Adjust the margin to control the spacing between the line and the row */
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
                                <a href="" class="text-muted">Order Edit Pending</a>
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
                    <h3 class="card-label">Order Edit Pending</h3>

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

                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-4">
                            <a style="background: #557D60; color: #ffff;" class="btn btn-default float-right btn-approve" id="approveButton" href="#">
                                <i class="flaticon-check"></i> Approve
                            </a>
                        </div>
                    </div>

                    {{-- Personal Details Start --}}
                    @if (count($data['order_updates']) > 0)
                        <div class="row">
                            <h5 class="font-weight-bold heading">Personal Details</h5>
                        </div>
                        <div class="row justify-content-center">
                            {{-- Left Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                {{-- first name --}}
                                @foreach ($data['order_updates'] as $key => $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>{{ $key + 1 }}.&nbsp;First Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->first_name !== $update->first_name)
                                                        <span class="hilight">{{ $order->first_name }}</span>
                                                    @else
                                                        <span>{{ $order->first_name }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->first_name }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- last name --}}
                                @foreach ($data['order_updates'] as $key => $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>{{ $key + 1 }}.&nbsp;Last Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->last_name !== $update->last_name)
                                                        <span class="hilight">{{ $order->last_name }}</span>
                                                    @else
                                                        <span>{{ $order->last_name }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->last_name }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- email --}}
                                @foreach ($data['order_updates'] as $key => $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>{{ $key + 1 }}.&nbsp;Email:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->email !== $update->email)
                                                        <span class="hilight">{{ $order->email }}</span>
                                                    @else
                                                        <span>{{ $order->email }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->email }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- country --}}
                                @foreach ($data['order_updates'] as $key => $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>{{ $key + 1 }}.&nbsp;Country:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->country !== $update->country)
                                                        <span class="hilight">{{ $order->country }}</span>
                                                    @else
                                                        <span>{{ $order->country }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->country }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- phone_number --}}
                                @foreach ($data['order_updates'] as $key => $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>{{ $key + 1 }}.&nbsp;Phone:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->phone_number !== $update->phone_number)
                                                        <span class="hilight">{{ $order->phone_number }}</span>
                                                    @else
                                                        <span>{{ $order->phone_number }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->phone_number }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- mailing_address --}}
                                @foreach ($data['order_updates'] as $key => $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>{{ $key + 1 }}.&nbsp;Mailing Address:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->mailing_address !== $update->mailing_address)
                                                        <span class="hilight">{{ $order->mailing_address }}</span>
                                                    @else
                                                        <span>{{ $order->mailing_address }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->mailing_address }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- zip_postal_code --}}
                                @foreach ($data['order_updates'] as $key => $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>{{ $key + 1 }}.&nbsp;Zip Code:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->zip_postal_code !== $update->zip_postal_code)
                                                        <span class="hilight">{{ $order->zip_postal_code }}</span>
                                                    @else
                                                        <span>{{ $order->zip_postal_code }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->zip_postal_code }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- city --}}
                                @foreach ($data['order_updates'] as $key => $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>{{ $key + 1 }}.&nbsp;City:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->city !== $update->city)
                                                        <span class="hilight">{{ $order->city }}</span>
                                                    @else
                                                        <span>{{ $order->city }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->city }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- state_province --}}
                                @foreach ($data['order_updates'] as $key => $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>{{ $key + 1 }}.&nbsp;State Province:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->state_province !== $update->state_province)
                                                        <span class="hilight">{{ $order->state_province }}</span>
                                                    @else
                                                        <span>{{ $order->state_province }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->state_province }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            {{-- Left Side End --}}


                            {{-- Right Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 10px;">

                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>

                                {{-- first name --}}
                                @foreach ($data['order_updates'] as $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>First Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    <input type="hidden" value="{{ $update->id }}"
                                                        data-id="{{ $update->id }}" data-action="approve"
                                                        data="personal">
                                                    @if ($order->first_name !== $update->first_name)
                                                        <span class="hilight">{{ $update->first_name }}</span>
                                                    @else
                                                        <span>{{ $update->first_name }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->first_name }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- last name --}}
                                @foreach ($data['order_updates'] as $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>Last Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->last_name !== $update->last_name)
                                                        <span class="hilight">{{ $update->last_name }}</span>
                                                    @else
                                                        <span>{{ $update->last_name }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->last_name }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- email --}}
                                @foreach ($data['order_updates'] as $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>Email:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->email !== $update->email)
                                                        <span class="hilight">{{ $update->email }}</span>
                                                    @else
                                                        <span>{{ $update->email }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->email }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- country --}}
                                @foreach ($data['order_updates'] as $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>Country:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->country !== $update->country)
                                                        <span class="hilight">{{ $update->country }}</span>
                                                    @else
                                                        <span>{{ $update->country }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->country }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- phone_number --}}
                                @foreach ($data['order_updates'] as $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>Phone:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->phone_number !== $update->phone_number)
                                                        <span class="hilight">{{ $update->phone_number }}</span>
                                                    @else
                                                        <span>{{ $update->phone_number }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->phone_number }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- mailing_address --}}
                                @foreach ($data['order_updates'] as $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>Mailing Address:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->mailing_address !== $update->mailing_address)
                                                        <span class="hilight">{{ $update->mailing_address }}</span>
                                                    @else
                                                        <span>{{ $update->mailing_address }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->mailing_address }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- zip_postal_code --}}
                                @foreach ($data['order_updates'] as $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>Zip Code:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->zip_postal_code !== $update->zip_postal_code)
                                                        <span class="hilight">{{ $update->zip_postal_code }}</span>
                                                    @else
                                                        <span>{{ $update->zip_postal_code }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->zip_postal_code }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- city --}}
                                @foreach ($data['order_updates'] as $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>City:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->city !== $update->city)
                                                        <span class="hilight">{{ $update->city }}</span>
                                                    @else
                                                        <span>{{ $update->city }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->city }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                {{-- state_province --}}
                                @foreach ($data['order_updates'] as $order)
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>State Province:</span>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($order->orderupdate->count() > 0)
                                                @foreach ($order->orderupdate as $update)
                                                    @if ($order->state_province !== $update->state_province)
                                                        <span class="hilight">{{ $update->state_province }}</span>
                                                    @else
                                                        <span>{{ $update->state_province }}</span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <span>{{ $order->state_province }}</span>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- Right Side End --}}
                        </div>
                    @endif
                    {{-- Personal Details Start --}}


                    {{-- Company Details Start --}}
                    <div class="row">
                        <h5 class="font-weight-bold heading">Company Details</h5>
                    </div>
                    <div class="row justify-content-center">
                        {{-- Left Side Start --}}
                        <div class="col-md-5"
                            style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                            <div class="row justify-content-center from_row">
                                <h5 class="font-weight-bold">From</h5>
                            </div>
                            {{-- Company Name --}}
                            @foreach ($data['order_updates'] as $key => $order)
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>{{ $key + 1 }}.&nbsp;Company Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($order->orderupdate->count() > 0)
                                            @foreach ($order->orderupdate as $update)
                                                @if ($order->company_name !== $update->company_name)
                                                    <span class="hilight">{{ $order->company_name }}</span>
                                                @else
                                                    <span>{{ $order->company_name }}</span>
                                                @endif
                                            @endforeach
                                        @else
                                            <span>{{ $order->company_name }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        {{-- Left Side End --}}



                        {{-- Right Side Start --}}
                        <div class="col-md-5"
                            style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 10px;">

                            <div class="row justify-content-center from_row">
                                <h5 class="font-weight-bold" style="">To</h5>
                            </div>

                            {{-- Company Name --}}
                            @foreach ($data['order_updates'] as $order)
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>Company Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($order->orderupdate->count() > 0)
                                            @foreach ($order->orderupdate as $update)
                                                @if ($order->company_name !== $update->company_name)
                                                    <span class="hilight">{{ $update->company_name }}</span>
                                                @else
                                                    <span>{{ $update->company_name }}</span>
                                                @endif
                                            @endforeach
                                        @else
                                            <span>{{ $order->company_name }}</span>
                                        @endif

                                    </div>
                                </div>
                            @endforeach


                        </div>
                        {{-- Right Side End --}}
                    </div>
                    {{-- Company Details End --}}


                    {{-- Company Management Start --}}
                    @if (count($data['compmanagmentData']) > 0 && count($data['compmanagmentupdateData']) > 0)
                        <div class="row">
                            <h5 class="font-weight-bold heading1">Company Management</h5>
                        </div>
                        <div class="row justify-content-center">
                            {{-- Left Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">

                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold">From</h5>
                                </div>

                                {{-- first name left side --}}
                                @foreach ($data['compmanagmentData'] as $order)
                                    @foreach ($order as $commanage)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>First Name:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['compmanagmentupdateData']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['compmanagmentupdateData'] as $updateOrder)
                                                        @foreach ($updateOrder as $update)
                                                            @if ($commanage->first_name === $update->first_name)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $commanage->first_name }}</span>
                                                    @else
                                                        <span>{{ $commanage->first_name }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $commanage->first_name }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Last name left side --}}
                                @foreach ($data['compmanagmentData'] as $order)
                                    @foreach ($order as $commanage)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>Last Name:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['compmanagmentupdateData']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['compmanagmentupdateData'] as $updateOrder)
                                                        @foreach ($updateOrder as $update)
                                                            @if ($commanage->last_name === $update->last_name)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $commanage->last_name }}</span>
                                                    @else
                                                        <span>{{ $commanage->last_name }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $commanage->last_name }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                            </div>
                            {{-- Left Side End --}}



                            {{-- Right Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">

                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold">To</h5>
                                </div>

                                {{-- first name Right side --}}
                                @foreach ($data['compmanagmentupdateData'] as $order)
                                    @foreach ($order as $commanageupdate)
                                        <input type="hidden" value="{{ $commanageupdate->id }}"
                                            data-id="{{ $commanageupdate->id }}" data-action="approve" data="cmanage">
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>First Name:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['compmanagmentData']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['compmanagmentData'] as $updateOrder)
                                                        @foreach ($updateOrder as $update)
                                                            @if ($commanageupdate->first_name === $update->first_name)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $commanageupdate->first_name }}</span>
                                                    @else
                                                        <span>{{ $commanageupdate->first_name }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $commanageupdate->first_name }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Last name left side --}}
                                @foreach ($data['compmanagmentupdateData'] as $order)
                                    @foreach ($order as $commanageupdate)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>Last Name:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['compmanagmentData']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['compmanagmentData'] as $updateOrder)
                                                        @foreach ($updateOrder as $update)
                                                            @if ($commanageupdate->last_name === $update->last_name)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $commanageupdate->last_name }}</span>
                                                    @else
                                                        <span>{{ $commanageupdate->last_name }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $commanageupdate->last_name }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach


                            </div>
                            {{-- Right Side End --}}
                        </div>
                    @endif
                    {{-- Company Management End --}}



                    {{-- Share Types Start --}}
                    @if (count($data['sharetype']) > 0 && count($data['sharetypeupdate']) > 0)
                        <div class="row">
                            <h5 class="font-weight-bold heading1">Share Types</h5>
                        </div>
                        <div class="row justify-content-center">
                            {{-- Left Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">

                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold">From</h5>
                                </div>

                                {{-- Share Number left side --}}
                                @foreach ($data['sharetype'] as $key => $order)
                                    @foreach ($order as $sharetype)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Share Number:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['sharetypeupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['sharetypeupdate'] as $updateShareType)
                                                        @foreach ($updateShareType as $update)
                                                            @if ($sharetype->share_number === $update->share_number)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $sharetype->share_number }}</span>
                                                    @else
                                                        <span>{{ $sharetype->share_number }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $sharetype->share_number }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Share Value left side --}}
                                @foreach ($data['sharetype'] as $key => $order)
                                    @foreach ($order as $sharetype)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Share Value:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['sharetypeupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['sharetypeupdate'] as $updateShareType)
                                                        @foreach ($updateShareType as $update)
                                                            @if ($sharetype->share_value === $update->share_value)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $sharetype->share_value }}</span>
                                                    @else
                                                        <span>{{ $sharetype->share_value }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $sharetype->share_value }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                            </div>
                            {{-- Left Side End --}}



                            {{-- Right Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">

                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold">To</h5>
                                </div>

                                {{-- Share Number left side --}}
                                @foreach ($data['sharetypeupdate'] as $order)
                                    @foreach ($order as $sharetype)
                                        <input type="hidden" value="{{ $sharetype->id }}"
                                            data-id="{{ $sharetype->id }}" data-action="approve" data="sharetype">
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>Share Number:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['sharetype']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['sharetype'] as $updateShareType)
                                                        @foreach ($updateShareType as $update)
                                                            @if ($sharetype->share_number === $update->share_number)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $sharetype->share_number }}</span>
                                                    @else
                                                        <span>{{ $sharetype->share_number }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $sharetype->share_number }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Share Value left side --}}
                                @foreach ($data['sharetypeupdate'] as $order)
                                    @foreach ($order as $sharetype)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>Share Value:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['sharetype']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['sharetype'] as $updateShareType)
                                                        @foreach ($updateShareType as $update)
                                                            @if ($sharetype->share_value === $update->share_value)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $sharetype->share_value }}</span>
                                                    @else
                                                        <span>{{ $sharetype->share_value }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $sharetype->share_value }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach


                            </div>
                            {{-- Right Side End --}}
                        </div>
                    @endif
                    {{-- Share Types End --}}



                    {{-- Agent Renewal Start --}}
                    @if (count($data['renewalmany']) > 0 && count($data['renewalupdate']) > 0)
                        <div class="row">
                            <h5 class="font-weight-bold heading1">Agent Renewal</h5>
                        </div>
                        <div class="row justify-content-center">
                            {{-- Left Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">

                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold">From</h5>
                                </div>

                                {{-- Cash left side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Cash:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->cash === $update->cash)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->cash }}</span>
                                                    @else
                                                        <span>{{ $renewal->cash }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->cash }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Trade Notes Input:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->tradeNotesInput === $update->tradeNotesInput)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->tradeNotesInput }}</span>
                                                    @else
                                                        <span>{{ $renewal->tradeNotesInput }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->tradeNotesInput }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash Allowence input side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Allowance Input:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->allowanceInput === $update->allowanceInput)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->allowanceInput }}</span>
                                                    @else
                                                        <span>{{ $renewal->allowanceInput }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->allowanceInput }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash accountsReceivable side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Accounts Receivable:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->accountsReceivable === $update->accountsReceivable)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->accountsReceivable }}</span>
                                                    @else
                                                        <span>{{ $renewal->accountsReceivable }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->accountsReceivable }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash governmentObligations side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Government Obligations:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->governmentObligations === $update->governmentObligations)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span
                                                            class="hilight">{{ $renewal->governmentObligations }}</span>
                                                    @else
                                                        <span>{{ $renewal->governmentObligations }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->governmentObligations }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash securities side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Securities:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->securities === $update->securities)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->securities }}</span>
                                                    @else
                                                        <span>{{ $renewal->securities }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->securities }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash currentAssets side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Current Assets:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->currentAssets === $update->currentAssets)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->currentAssets }}</span>
                                                    @else
                                                        <span>{{ $renewal->currentAssets }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->currentAssets }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash loans side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Loans:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->loans === $update->loans)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->loans }}</span>
                                                    @else
                                                        <span>{{ $renewal->loans }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->loans }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash mortgage side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Mortgage:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->mortgage === $update->mortgage)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->mortgage }}</span>
                                                    @else
                                                        <span>{{ $renewal->mortgage }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->mortgage }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash otherInvestments side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Other Investments:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->otherInvestments === $update->otherInvestments)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->otherInvestments }}</span>
                                                    @else
                                                        <span>{{ $renewal->otherInvestments }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->otherInvestments }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- buildings side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Buildings:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->buildings === $update->buildings)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->buildings }}</span>
                                                    @else
                                                        <span>{{ $renewal->buildings }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->buildings }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- depietableAssets side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Depietable Assets:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->depietableAssets === $update->depietableAssets)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->depietableAssets }}</span>
                                                    @else
                                                        <span>{{ $renewal->depietableAssets }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->depietableAssets }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Land:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->land === $update->land)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->land }}</span>
                                                    @else
                                                        <span>{{ $renewal->land }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->land }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Intangible Assets:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->intangibleAssets === $update->intangibleAssets)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->intangibleAssets }}</span>
                                                    @else
                                                        <span>{{ $renewal->intangibleAssets }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->intangibleAssets }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach


                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Accumulated Amortization:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->accumulatedAmortization === $update->accumulatedAmortization)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span
                                                            class="hilight">{{ $renewal->accumulatedAmortization }}</span>
                                                    @else
                                                        <span>{{ $renewal->accumulatedAmortization }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->accumulatedAmortization }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach


                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Intangible Amortization:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->intangibleAmortization === $update->intangibleAmortization)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span
                                                            class="hilight">{{ $renewal->intangibleAmortization }}</span>
                                                    @else
                                                        <span>{{ $renewal->intangibleAmortization }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->intangibleAmortization }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Other Assets:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->otherAssets === $update->otherAssets)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->otherAssets }}</span>
                                                    @else
                                                        <span>{{ $renewal->otherAssets }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->otherAssets }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach


                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalmany'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Total Assets Value:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalupdate']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalupdate'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->totalAssetsValue === $update->totalAssetsValue)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->totalAssetsValue }}</span>
                                                    @else
                                                        <span>{{ $renewal->totalAssetsValue }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->totalAssetsValue }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                            </div>
                            {{-- Left Side End --}}



                            {{-- Right Side Start --}}
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">


                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold">To</h5>
                                </div>

                                {{-- Cash left side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <input type="hidden" value="{{ $renewal->id }}"
                                            data-id="{{ $renewal->id }}" data-action="approve" data="renewal">
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Cash:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->cash === $update->cash)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->cash }}</span>
                                                    @else
                                                        <span>{{ $renewal->cash }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->cash }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Trade Notes Input:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->tradeNotesInput === $update->tradeNotesInput)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->tradeNotesInput }}</span>
                                                    @else
                                                        <span>{{ $renewal->tradeNotesInput }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->tradeNotesInput }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash Allowence input side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Allowance Input:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->allowanceInput === $update->allowanceInput)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->allowanceInput }}</span>
                                                    @else
                                                        <span>{{ $renewal->allowanceInput }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->allowanceInput }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash accountsReceivable side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Accounts Receivable:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->accountsReceivable === $update->accountsReceivable)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->accountsReceivable }}</span>
                                                    @else
                                                        <span>{{ $renewal->accountsReceivable }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->accountsReceivable }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash governmentObligations side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Government Obligations:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->governmentObligations === $update->governmentObligations)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span
                                                            class="hilight">{{ $renewal->governmentObligations }}</span>
                                                    @else
                                                        <span>{{ $renewal->governmentObligations }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->governmentObligations }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash securities side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Securities:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->securities === $update->securities)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->securities }}</span>
                                                    @else
                                                        <span>{{ $renewal->securities }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->securities }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash currentAssets side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Current Assets:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->currentAssets === $update->currentAssets)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->currentAssets }}</span>
                                                    @else
                                                        <span>{{ $renewal->currentAssets }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->currentAssets }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash loans side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Loans:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->loans === $update->loans)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->loans }}</span>
                                                    @else
                                                        <span>{{ $renewal->loans }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->loans }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash mortgage side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Mortgage:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->mortgage === $update->mortgage)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->mortgage }}</span>
                                                    @else
                                                        <span>{{ $renewal->mortgage }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->mortgage }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash otherInvestments side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Other Investments:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->otherInvestments === $update->otherInvestments)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->otherInvestments }}</span>
                                                    @else
                                                        <span>{{ $renewal->otherInvestments }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->otherInvestments }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- buildings side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Buildings:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->buildings === $update->buildings)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->buildings }}</span>
                                                    @else
                                                        <span>{{ $renewal->buildings }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->buildings }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- depietableAssets side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Depietable Assets:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->depietableAssets === $update->depietableAssets)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->depietableAssets }}</span>
                                                    @else
                                                        <span>{{ $renewal->depietableAssets }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->depietableAssets }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Land:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->land === $update->land)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->land }}</span>
                                                    @else
                                                        <span>{{ $renewal->land }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->land }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Intangible Assets:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->intangibleAssets === $update->intangibleAssets)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->intangibleAssets }}</span>
                                                    @else
                                                        <span>{{ $renewal->intangibleAssets }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->intangibleAssets }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach


                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Accumulated Amortization:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->accumulatedAmortization === $update->accumulatedAmortization)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span
                                                            class="hilight">{{ $renewal->accumulatedAmortization }}</span>
                                                    @else
                                                        <span>{{ $renewal->accumulatedAmortization }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->accumulatedAmortization }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach


                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Intangible Amortization:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->intangibleAmortization === $update->intangibleAmortization)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span
                                                            class="hilight">{{ $renewal->intangibleAmortization }}</span>
                                                    @else
                                                        <span>{{ $renewal->intangibleAmortization }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->intangibleAmortization }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Other Assets:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->otherAssets === $update->otherAssets)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->otherAssets }}</span>
                                                    @else
                                                        <span>{{ $renewal->otherAssets }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->otherAssets }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach


                                <hr>

                                {{-- Cash Trade note side --}}
                                @foreach ($data['renewalupdate'] as $order)
                                    @foreach ($order as $key => $renewal)
                                        <div class="row inner_row">
                                            <div class="col-md-6">
                                                <span>{{ $key + 1 }}.&nbsp;Total Assets Value:</span>
                                            </div>
                                            <div class="col-md-6">
                                                @if (count($data['renewalmany']) > 0)
                                                    @php
                                                        $isDifferent = true;
                                                    @endphp

                                                    @foreach ($data['renewalmany'] as $updateRenewal)
                                                        @foreach ($updateRenewal as $update)
                                                            @if ($renewal->totalAssetsValue === $update->totalAssetsValue)
                                                                @php
                                                                    $isDifferent = false;
                                                                    break 2; // Break out of both loops
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                    @if ($isDifferent)
                                                        <span class="hilight">{{ $renewal->totalAssetsValue }}</span>
                                                    @else
                                                        <span>{{ $renewal->totalAssetsValue }}</span>
                                                    @endif
                                                @else
                                                    <span>{{ $renewal->totalAssetsValue }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach

                            </div>
                            {{-- Right Side End --}}
                        </div>
                    @endif
                    {{-- Agent Renewal End --}}



                    {{-- <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <!--Personal Detail Table-->
                            <table class="table table-bordered table-hover table-checkable table-responsive"
                                id="clientOrderTable" style="margin-top: 13px !important">
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody id="clientOrderTbody">
                                    @foreach ($order_updates as $order)
                                        @isset($order_updates)
                                            @foreach ($order->orderupdate->where('status', 0) as $orderUpdate)
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
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-primary btn-icon dropdown-toggle"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Approve
                                                                <i class="fi fi-br-menu-dots-vertical"></i>
                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item btn-approve" href="#"
                                                                    data-id="{{ $orderUpdate->id }}" data-action="approve"
                                                                    data="personal">
                                                                    <i class="flaticon-check"></i> Approve
                                                                </a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.view.changes', ['order_id' => $orderUpdate->order_update_id]) }}"
                                                                    target="_blank">
                                                                    <i class="flaticon-cross"></i> View Changes
                                                                </a>
                                                            </div>
                                                        </div>

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
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody id="clientOrderTbody">
                                    @foreach ($order_updates as $order)
                                        @isset($order_updates)
                                            @foreach ($order->managementupdate->where('status', 0) as $managementupdates)
                                                <tr>
                                                    <td>{{ $order->type_of_business }}</td>
                                                    <td>{{ $managementupdates->type }}</td>
                                                    <td>{{ $managementupdates->first_name }}</td>
                                                    <td>{{ $managementupdates->last_name }}</td>
                                                    <td>{{ $managementupdates->created_at }}</td>
                                                    <td>
                                                        @if ($managementupdates->status == 0)
                                                            Pending
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-primary btn-icon dropdown-toggle"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Approve
                                                                <i class="fi fi-br-menu-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item btn-approve" href="#"
                                                                    data-id="{{ $managementupdates->id }}"
                                                                    data-action="approve" data="omanage">
                                                                    <i class="flaticon-check"></i> Approve
                                                                </a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.view.changes.o.manage', ['order_id' => $managementupdates->order_id]) }}"
                                                                    target="_blank">
                                                                    <i class="flaticon-cross"></i> View Changes
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    @endforeach
                                </tbody>

                            </table>
                            <!--Comany Managerment Table-->
                        </div>

                        <div class="tab-pane fade" id="nav-compmanage" role="tabpanel"
                            aria-labelledby="nav-compmanage-tab">
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody id="clientOrderTbody">
                                    @foreach ($order_updates as $order)
                                        @isset($order_updates)
                                            @foreach ($order->companymanagementupdate->where('status', 0) as $compmanage)
                                                <tr>
                                                    <td>{{ $order->type_of_business }}</td>
                                                    <td>{{ $compmanage->type }}</td>
                                                    <td>{{ $compmanage->first_name }}</td>
                                                    <td>{{ $compmanage->last_name }}</td>
                                                    <td>{{ $compmanage->created_at }}</td>
                                                    <td>
                                                        @if ($compmanage->status == 0)
                                                            Pending
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-primary btn-icon dropdown-toggle"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Approve
                                                                <i class="fi fi-br-menu-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item btn-approve" href="#"
                                                                    data-id="{{ $compmanage->id }}" data-action="approve"
                                                                    data="cmanage">
                                                                    <i class="flaticon-check"></i> Approve
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    @endforeach
                                </tbody>

                            </table>
                            <!--Comany Managerment Table-->
                        </div>

                        <div class="tab-pane fade" id="nav-sharetype" role="tabpanel"
                            aria-labelledby="nav-sharetype-tab">
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>


                                <tbody id="clientOrderTbody">
                                    @foreach ($order_updates as $order)
                                        @isset($order_updates)
                                            @foreach ($order->shareupdate->where('status', 0) as $shareupdates)
                                                <tr>
                                                    <td>{{ $order->type_of_business }}</td>
                                                    <td>{{ $shareupdates->type }}</td>
                                                    <td>{{ $shareupdates->share_number }}</td>
                                                    <td>{{ $shareupdates->share_value }}</td>
                                                    <td>{{ $shareupdates->created_at }}</td>
                                                    <td>
                                                        @if ($shareupdates->status == 0)
                                                            Pending
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-primary btn-icon dropdown-toggle"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Approve
                                                                <i class="fi fi-br-menu-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item btn-approve" href="#"
                                                                    data-id="{{ $shareupdates->id }}" data-action="approve"
                                                                    data="sharetype">
                                                                    <i class="flaticon-check"></i> Approve
                                                                </a>
                                                            </div>
                                                        </div>

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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody id="clientOrderTbody">
                                        @foreach ($order_updates as $order)
                                            @isset($order_updates)
                                                @foreach ($order->renewalupdate->where('status', 0) as $renewalupdates)
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
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm btn-primary btn-icon dropdown-toggle"
                                                                    type="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">Approve
                                                                    <i class="fi fi-br-menu-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item btn-approve" href="#"
                                                                        data-id="{{ $renewalupdates->id }}"
                                                                        data-action="approve" data="renewal">
                                                                        <i class="flaticon-check"></i> Approve
                                                                    </a>
                                                                </div>
                                                            </div>

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
            // Add a click event handler to the "Approve" button
            $('#approveButton').on('click', function() {

                $('.btn-approve').text('Waiting...');
                $('.btn-approve').prop('disabled', true);

                var dataToSend = [];

                // Iterate through the hidden fields with data attributes
                $('[data-id]').each(function() {
                    var $hiddenField = $(this);
                    var dataId = $hiddenField.data('id');
                    var dataAction = $hiddenField.data('action');
                    var dataValue = $hiddenField.attr('data');

                    // Add the data to the dataToSend array
                    dataToSend.push({
                        id: dataId,
                        action: dataAction,
                        value: dataValue
                    });
                });

                // Perform an AJAX request to send the data
                $.ajax({
                    type: 'POST', // Adjust the HTTP method as needed
                    url: '{{ route('admin.request.approved.personal') }}',
                    data: JSON.stringify(dataToSend),
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        if(response.status == 200){
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);

                            $('.btn-approve').prop('disabled', false);
                        }

                        if(response.status == 400){
                            $('.btn-approve').prop('disabled', false);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        $('.btn-approve').prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
