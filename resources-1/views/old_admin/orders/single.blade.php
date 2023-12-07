@extends('admin.layouts.master')
@section('title',$title)
@section('content')
  <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
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
                <a href="" class="text-muted">Manage Orders</a>
              </li>
              <li class="breadcrumb-item text-muted">
                Order Detail
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
              <h3 class="card-label">Order Detail
                <i class="mr-2"></i>
                </h3>

            </div>
            <div class="card-toolbar">
                <a href="{{ route('orders.index') }}" class="btn btn-light-primary
              font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

            </div>
          </div>
          <div class="card-body">
          @include('admin.partials._messages')
          <!--begin::Form-->
            {{ Form::model($user, [ 'method' => 'PATCH','route' => ['orders.update', $user->id],'class'=>'form' ,"id"=>"client_update_form", 'enctype'=>'multipart/form-data'])}}
              @csrf
              <div class="row">
{{--                  <div class="col-4 mb-5">--}}
{{--                      <label for="">Payment Status</label>--}}
{{--                      <select name="status" id="status" class="form-control">--}}
{{--                          <option value="0" @if($user->status == 0) selected @endif>Payment is pending</option>--}}
{{--                          <option value="1" @if($user->status == 1) selected @endif>Paid</option>--}}
{{--                          <option value="2" @if($user->status == 2) selected @endif>Cancel</option>--}}
{{--                      </select>--}}
{{--                  </div>--}}
                  <table class="table">
                      <tr>
                          <th>First Name</th>
                          <td>{{$user->first_name}}</td>
                      </tr>
                      <tr>
                          <td>Last name</td>
                          <td>{{$user->last_name}}</td>
                      </tr>

                      <tr>
                          <td>MailingAddress</td>
                          <td>{{$user->mailing_address}}</td>
                      </tr>
                      <tr>
                          <td>Zip Postal Code</td>
                          <td>{{$user->zip_postal_code}}</td>
                      </tr>

                      <tr>
                          <td>City</td>
                          <td>{{$user->city}}</td>
                      </tr>
                      <tr>
                          <td>StateProvince</td>
                          <td>{{$user->state_province}}</td>
                      </tr>
                      <tr>
                          <td>Country</td>
                          <td>{{$user->country}}</td>
                      </tr>
                      <tr>
                          <td>PhoneNumber</td>
                          <td>{{$user->phone_number}}</td>
                      </tr>
                      <tr>
                          <td>Email</td>
                          <td>{{$user->email}}</td>
                      </tr>
                      <tr>
                          <td>AttorneyFirstName</td>
                          <td>{{$user->attorney_first_name}}</td>
                      </tr>
                      <tr>
                          <td>AttorneyLastName</td>
                          <td>{{$user->attorney_last_name}}</td>
                      </tr>
                      <tr>
                          <td>AttorneyMailingAddress</td>
                          <td>{{$user->attorney_mailing_address}}</td>
                      </tr>
                      <tr>
                          <td>CompanyName</td>
                          <td>{{$user->company_name}}</td>
                      </tr>
                      <tr>
                          <td>Type of Business</td>
                          <td>{{$user->type_of_business}}</td>
                      </tr>
                      <tr>
                          <td>Company Physical Address</td>
                          <td>{{$user->company_physical_address}}</td>
                      </tr>
                      <tr>
                          <td>Company Mailing Address</td>
                          <td>{{$user->company_mailing_address}}</td>
                      </tr>




                      <tr>
                          <th>Payment Status</th>
                          <td>
                              @if($user->payment_status == 1)
                                  <label class="label label-success label-inline mr-2">Paid</label>
                              @elseif($user->payment_status == 0)
                                  <label class="label label-info label-inline mr-2">Payment is pending</label>
                              @elseif($user->payment_status == 2)
                                  <label class="label label-danger label-inline mr-2">Cancel</label>
                              @endif
                          </td>
                      </tr>





                  </table>
                  <table class="table">
                      <thead>
                      <tr class="bg-light-info">
                          <th>Item Detail</th>
                          <th>Quantity</th>
                          <th>price</th>
{{--                          <th>Gst</th>--}}
{{--                          <th>Hst</th>--}}
{{--                          <th>Pst</th>--}}
                          <th>Amount</th>
                      </tr>
                      </thead>
                      <tbody>

                        @foreach($user->items as $item)
                            <tr>

                                <td>{{$item->Description}}</td>
                                <td>{{1}}</td>
                                <td>{{$item->amount}}</td>

                                <td>{{round($item->amount ,2)}}</td>

                            </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                      <tr class="bg-light-success">
                          <th colspan="3">Total</th>
                          <td >${{round($user->total,2)}}</td>
                      </tr>
                      </tfoot>
                  </table>

                  <table class="table">
                      <thead>
                      <tr class="bg-light-info">
                          <th>Management</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Address to Record with State</th>
                      </tr>
                      </thead>
                      <tbody>

                        @foreach($user->managements as $management)
                            <tr>

                                <td>{{$management->type}}</td>
                                <td>{{$management->first_name}}</td>
                                <td>{{$management->last_name}}</td>
                                <td>{{$management->address_to_record_with_state}}</td>

                            </tr>
                        @endforeach
                      </tbody>
                  </table>


              </div>
          {{Form::close()}}
            <!--end::Form-->
          </div>

            <!-- Modal-->
            <div class="modal fade" id="clientModel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Kid Detail</h4> </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        </div>
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
@section("scripts")
    <script !src="">
        $("#status").change(function () {
            $("#client_update_form").submit();
        });

        function printDiv()
        {

            var divToPrint=document.getElementById('DivIdToPrint');

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
