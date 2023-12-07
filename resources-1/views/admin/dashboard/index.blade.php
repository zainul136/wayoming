@extends('admin.layouts.master')
@section('title', $title)
@section('content')

    <style>
        .analytics-card-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .analytics-card-container .card {
            width: 100%;
            padding: 26px 16px;
            height: 230px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-radius: 15px;
        }

        .analytics-card-first {
            display: flex;
            justify-content: space-between;
        }

        .analytics-card-first-left {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .analytics-card-first-svg-box {
            background-color: #fff;
            border-radius: 10px;
        }

        .analytics-card-container p {
            margin: 0;
        }

        .analytics-card-first select {
            background-color: rgba(16, 36, 55, 0.08);
            padding: 2.46px 3.91px 2.46px 6px;
            border-radius: 7.37px;
            border: none;
        }

        .analytics-card-mid {
            color: #292929;
            font-size: 39px;
            font-weight: 700;
            text-align: center;
        }

        .search_i {
            /* margin-top: 10px; */
            cursor: pointer;
            margin-left: -23px;
            background-color: #fff !important;
            border: 0px;
        }
    </style>
    <!--begin::Container-->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="analytics-card-container">
                    <div class="card first-card">
                        <div class="analytics-card-first">
                            <div class="analytics-card-first-left">
                                <div class="analytics-card-first-svg-box">
                                    <svg width="18" height="23" viewBox="0 0 18 23" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.22325 10.4517C11.937 10.4517 14.137 8.2518 14.137 5.53803C14.137 2.82427 11.937 0.624329 9.22325 0.624329C6.50949 0.624329 4.30955 2.82427 4.30955 5.53803C4.30955 8.2518 6.50949 10.4517 9.22325 10.4517ZM9.22325 22.736C13.9723 22.736 17.8222 20.5361 17.8222 17.8223C17.8222 15.1085 13.9723 12.9086 9.22325 12.9086C4.47416 12.9086 0.624268 15.1085 0.624268 17.8223C0.624268 20.5361 4.47416 22.736 9.22325 22.736Z"
                                            fill="#B595FF" />
                                    </svg>
                                </div>
                                <p>Total Registered User</p>
                            </div>
                        </div>
                        <form action="" method="POST" id="userForm">

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control datestart" name="from_date_user"
                                        placeholder="Start Date">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control dateend" name="to_date_user"
                                        placeholder="End Date">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-default search_i btn_search_user">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="analytics-card-mid" id="totalUser">{{ $data['total_user'] ?? '0' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="analytics-card-container">
                    <div class="card first-card">
                        <div class="analytics-card-first">
                            <div class="analytics-card-first-left">
                                <div class="analytics-card-first-svg-box">
                                    <svg width="18" height="23" viewBox="0 0 18 23" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.22325 10.4517C11.937 10.4517 14.137 8.2518 14.137 5.53803C14.137 2.82427 11.937 0.624329 9.22325 0.624329C6.50949 0.624329 4.30955 2.82427 4.30955 5.53803C4.30955 8.2518 6.50949 10.4517 9.22325 10.4517ZM9.22325 22.736C13.9723 22.736 17.8222 20.5361 17.8222 17.8223C17.8222 15.1085 13.9723 12.9086 9.22325 12.9086C4.47416 12.9086 0.624268 15.1085 0.624268 17.8223C0.624268 20.5361 4.47416 22.736 9.22325 22.736Z"
                                            fill="#B595FF" />
                                    </svg>
                                </div>
                                <p>Total Orders</p>
                            </div>
                        </div>
                        <form action="" method="POST" id="totalOrderForm">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control datestart" id="from_date" name="from_date"
                                        placeholder="Start Date" autocomplete="off">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control dateend" id="to_date" name="to_date"
                                        placeholder="End Date" autocomplete="off">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-default search_i btn_search">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="analytics-card-mid" id="tot_orders">{{ $data['total_orders'] ?? '0' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <div class="analytics-card-container">
                    <div class="card first-card">
                        <div class="analytics-card-first">
                            <div class="analytics-card-first-left">
                                <div class="analytics-card-first-svg-box">
                                    <svg width="18" height="23" viewBox="0 0 18 23" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.22325 10.4517C11.937 10.4517 14.137 8.2518 14.137 5.53803C14.137 2.82427 11.937 0.624329 9.22325 0.624329C6.50949 0.624329 4.30955 2.82427 4.30955 5.53803C4.30955 8.2518 6.50949 10.4517 9.22325 10.4517ZM9.22325 22.736C13.9723 22.736 17.8222 20.5361 17.8222 17.8223C17.8222 15.1085 13.9723 12.9086 9.22325 12.9086C4.47416 12.9086 0.624268 15.1085 0.624268 17.8223C0.624268 20.5361 4.47416 22.736 9.22325 22.736Z"
                                            fill="#B595FF" />
                                    </svg>
                                </div>
                                <p>Total Registered Agent</p>
                            </div>
                        </div>
                        <form action="" method="POST" id="agentForm">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control datestart" id="from_date_agent"
                                        placeholder="Start Date">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control dateend" id="to_date_agent"
                                        placeholder="End Date">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-default search_i btn_search_agent">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="analytics-card-mid" id="agentTotal">{{ $data['registered_agent'] ?? '0' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="analytics-card-container">
                    <div class="card first-card">
                        <div class="analytics-card-first">
                            <div class="analytics-card-first-left">
                                <div class="analytics-card-first-svg-box">
                                    <svg width="18" height="23" viewBox="0 0 18 23" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.22325 10.4517C11.937 10.4517 14.137 8.2518 14.137 5.53803C14.137 2.82427 11.937 0.624329 9.22325 0.624329C6.50949 0.624329 4.30955 2.82427 4.30955 5.53803C4.30955 8.2518 6.50949 10.4517 9.22325 10.4517ZM9.22325 22.736C13.9723 22.736 17.8222 20.5361 17.8222 17.8223C17.8222 15.1085 13.9723 12.9086 9.22325 12.9086C4.47416 12.9086 0.624268 15.1085 0.624268 17.8223C0.624268 20.5361 4.47416 22.736 9.22325 22.736Z"
                                            fill="#B595FF" />
                                    </svg>
                                </div>
                                <p>Total Form a New Company</p>
                            </div>
                        </div>
                        <form action="" method="POST" id="companyForm">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control datestart" id="from_date_com"
                                        placeholder="Start Date">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control dateend" id="to_date_com"
                                        placeholder="End Date">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-default search_i btn_search_company">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="analytics-card-mid" id="formCompany">{{ $data['form_company'] ?? '0' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="analytics-card-container">
                    <div class="card first-card">
                        <div class="analytics-card-first">
                            <div class="analytics-card-first-left">
                                <div class="analytics-card-first-svg-box">
                                    <svg width="18" height="23" viewBox="0 0 18 23" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.22325 10.4517C11.937 10.4517 14.137 8.2518 14.137 5.53803C14.137 2.82427 11.937 0.624329 9.22325 0.624329C6.50949 0.624329 4.30955 2.82427 4.30955 5.53803C4.30955 8.2518 6.50949 10.4517 9.22325 10.4517ZM9.22325 22.736C13.9723 22.736 17.8222 20.5361 17.8222 17.8223C17.8222 15.1085 13.9723 12.9086 9.22325 12.9086C4.47416 12.9086 0.624268 15.1085 0.624268 17.8223C0.624268 20.5361 4.47416 22.736 9.22325 22.736Z"
                                            fill="#B595FF" />
                                    </svg>
                                </div>
                                <p>Total File Annual Report</p>
                            </div>
                        </div>
                        <form action="" method="POST" id="annualForm">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control datestart" id="from_date_annual"
                                        placeholder="Start Date">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control dateend" id="to_date_annual"
                                        placeholder="End Date">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-default search_i btn_search_annual">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="analytics-card-mid" id="annualTotal">{{ $data['file_annual'] ?? '0' }}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end::Container-->
@endsection

@section('stylesheets')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!--end::Page Vendors Styles-->
@endsection
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize the datepicker
            $('.datestart').datepicker({});
            $('.dateend').datepicker({
                dateFormat: 'yy-mm-dd'
            });


            //For All User
            $('#userForm').on('click', '.btn_search_user', function() {

                var fromDateValue = $('#from_date_user').val();
                var toDateValue = $('#to_date_user').val();

                $.ajax({
                    type: 'GET',
                    url: '{{ route('admin.user.date') }}',
                    data: {
                        from_date: fromDateValue,
                        to_date: toDateValue,
                    },
                    success: function(response) {

                        $('#totalUser').text(response);

                        console.log('Data received from server: ' + response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ' + error);
                    }
                });

            });

            //For All Ordrs
            $('#totalOrderForm').on('click', '.btn_search', function() {

                var fromDateValue = $('#from_date').val();
                var toDateValue = $('#to_date').val();

                $.ajax({
                    type: 'GET',
                    url: '{{ route('admin.date') }}',
                    data: {
                        from_date: fromDateValue,
                        to_date: toDateValue,
                    },
                    success: function(response) {

                        $('#tot_orders').text(response);

                        console.log('Data received from server: ' + response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ' + error);
                    }
                });

            });

            //For all agent order
            $('#agentForm').on('click', '.btn_search_agent', function() {

                var fromDateValue = $('#from_date_agent').val();
                var toDateValue = $('#to_date_agent').val();

                $.ajax({
                    type: 'GET',
                    url: '{{ route('admin.agent.date') }}',
                    data: {
                        from_date: fromDateValue,
                        to_date: toDateValue,
                    },
                    success: function(response) {

                        $('#agentTotal').text(response);

                        console.log('Data received from server: ' + response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ' + error);
                    }
                });

            });

            //For company order
            $('#companyForm').on('click', '.btn_search_company', function() {

                var fromDateValue = $('#from_date_com').val();
                var toDateValue = $('#to_date_com').val();

                $.ajax({
                    type: 'GET',
                    url: '{{ route('admin.company.date') }}',
                    data: {
                        from_date: fromDateValue,
                        to_date: toDateValue,
                    },
                    success: function(response) {

                        $('#formCompany').text(response);

                        console.log('Data received from server: ' + response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ' + error);
                    }
                });

            });

            //For annual order
            $('#annualForm').on('click', '.btn_search_annual', function() {

                var fromDateValue = $('#from_date_annual').val();
                var toDateValue = $('#to_date_annual').val();

                $.ajax({
                    type: 'GET',
                    url: '{{ route('admin.annual.date') }}',
                    data: {
                        from_date: fromDateValue,
                        to_date: toDateValue,
                    },
                    success: function(response) {

                        $('#annualTotal').text(response);

                        console.log('Data received from server: ' + response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error: ' + error);
                    }
                });

            });

        });
    </script>

@endsection
