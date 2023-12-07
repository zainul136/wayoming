@extends('client.layouts.master')
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
                <a href="" class="text-muted">Manage Kid Items</a>
              </li>
              <li class="breadcrumb-item text-muted">
                <a href="" class="text-muted">Add Items</a>
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
              <h3 class="card-label">Item Order Form
                <i class="mr-2"></i>
                </h3>

            </div>
            <div class="card-toolbar">

              <a href="{{ route('parent-kids.index') }}" class="btn btn-light-primary
              font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
              <a href="#" class="btn btn-light-success
              font-weight-bolder mr-2 " id="add">
                <i class="fa fa-cart-plus icon-sm"></i>Add to Cart</a>

              <div class="btn-group">
                <a href="#"   id="kt_btn" class="btn btn-primary font-weight-bolder">
                  <i class="ki ki-check icon-sm"></i>Proceed Checkout</a>



              </div>
            </div>
          </div>
          <div class="card-body">
          @include('admin.partials._messages')
          <!--begin::Form-->
            {{ Form::open([ 'route' => 'admin.parentKidOrder','class'=>'form' ,"id"=>"client_add_form", 'enctype'=>'multipart/form-data']) }}
              @csrf
{{--              <input type="hidden" value="{{$user->id}}"  name="kid_id" id="">--}}
{{--              <input type="hidden" value="{{$user->school_id}}"  name="school_id" id="">--}}
              <div class="row">
                <div class="col-xl-12">
                  <div class="my-5 row">
                      <div class="col-4">
                          <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                              <label class="col-3">Kid</label>
                              <div class="col-9">
                                  <select name="kid_id" id="" class="form-control">
                                      @foreach($kids as $kid)
                                          <option value="{{$kid->id}}">{{$kid->name}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>


                  </div><div class="my-5 row">
                      <div class="col">
                          <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                              <label class="col-3">Date</label>
                              <div class="col-9">
                                  {{ Form::date('date', null, ['class' => 'form-control form-control-solid','id'=>'date','placeholder'=>'Enter Name','required'=>'true']) }}
                                  <span class="text-danger">{{ $errors->first('date') }}</span>
                              </div>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group row {{ $errors->has('school') ? 'has-error' : '' }}">
                              <label class="col-3">Menus</label>
                              <div class="col-9">
                                  <select name="menu" id="menu" class="form-control">
                                      @foreach($menus as $menu)
                                          <option value="{{$menu->id}}">{{$menu->name}}</option>
                                      @endforeach
                                  </select>
                                  <span class="text-danger">{{ $errors->first('school') }}</span>
                              </div>
                          </div>
                      </div>
                      <div class="col menu-product">

                      </div>

                  </div>

                </div>
                <div class="col-xl-2"></div>
              </div>

              <table class="table">
                  <thead>
                      <tr>
                          <th>Item Detail</th>
                          <th>Date</th>
                          <th>Amount</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
{{--                      <tr>--}}
{{--                          <td><p>Lorem ipsum dolor sit amet, </p>--}}
{{--                              <input type="hidden"  name="detail[]" value="">--}}
{{--                              <input type="hidden" name="item_id[]" value="">--}}
{{--                              <input type="hidden" name="date[]" value="">--}}
{{--                              <input type="hidden" class="amount" name="amount[]" value="0">--}}
{{--                          </td>--}}
{{--                          <td></td>--}}
{{--                          <td>20</td>--}}
{{--                          <td>--}}
{{--                              <button class="btn btn-sm btn-danger remove"><i class="fa fa-trash"></i></button>--}}
{{--                          </td>--}}
{{--                      </tr>--}}
                  </tbody>
                  <tfoot>
                  <tr>
                      <td></td>
                      <td>Overall Total</td>
                      <td>
                          <p class="overall_text">0</p>
                          <input type="hidden" name="overall" class="overall">
                      </td>
                      <td ></td>
                  </tr>
                  </tfoot>
              </table>
          {{Form::close()}}
            <!--end::Form-->
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

    <script>
        function submit(event){
            event.preventDefault();

        }
        $( document ).ready(function() {
            var id  = $("#menu").val();
            menuProducts(id);
        });
        function menuProducts(id) {

            var CSRF_TOKEN = '{{ csrf_token() }}';
            $.post("{{ route('admin.getMenuProducts') }}", {_token: CSRF_TOKEN, id: id}).done(function (response) {
                $('.menu-product').html(response);

            });
        }

        $("input").change(function(){
            var id = $(this).val();
            menuProducts(id);
        });

        $("#add").click(function (e) {
            e.preventDefault();
            var date  = $("#date").val();
            if(date == ""){
                swal.fire("Plz Enter Date First");
            }else{
                var found = false;
                var date_products = 0;
                $("tbody tr").each(function () {
                    var found_id = $(this).find(".item_id").val();
                    var found_date = $(this).find(".date").val();
                    if(found_date == date){
                        date_products = date_products + 1;
                    }
                });
                if(date_products >=3){
                    swal.fire("You have Already add three product in this date");
                }else{
                    $(".product_checked").each(function () {

                        if($(this).is(":checked")){
                            found = true;
                            product_found = false;
                            var product_id = $(this).parent().parent().find(".product_id").val();
                            var product_name = $(this).parent().parent().find(".product_name").val();
                            var product_radio = $(this).parent().parent().find('input[name='+product_id+']:checked');
                            var product_size =  product_radio.attr("sz");
                            var product_price =  product_radio.val();
                            $("tbody tr").each(function () {
                                var found_id = $(this).find(".item_id").val();
                                var found_date = $(this).find(".date").val();
                                if(found_date == date && found_id == product_id){
                                    product_found = true;
                                    $(this).find(".detail_text").html(product_size);
                                    $(this).find(".amount_text").html(product_price);
                                    $(this).find(".amount").val(product_price);
                                    $(this).find(".detail").val(product_size);
                                }
                            });
                            if(product_found == false){
                                $("tbody").append("<tr>\n" +
                                    "                          <td><p class=\"detail_text\">"+ product_size +" </p>\n" +
                                    "                              <input type=\"hidden\"  name=\"detail[]\" class=\"detail\" value=\""+ product_size +"\">\n" +
                                    "                              <input type=\"hidden\" name=\"item_id[]\" class=\"item_id\" value=\""+ product_id +"\">\n" +
                                    "                              <input type=\"hidden\" name=\"date[]\" class=\"date\" value=\""+ date +"\">\n" +
                                    "                              <input type=\"hidden\" class=\"amount\" name=\"amount[]\" value=\""+ product_price +"\">\n" +
                                    "                          </td>\n" +
                                    "                          <td>"+ date +"</td>\n" +
                                    "                          <td class=\"amount_text\">"+ product_price +"</td>\n" +
                                    "                          <td>\n" +
                                    "                              <a href=\"#\" class=\"btn btn-sm btn-danger remove\"><i class=\"fa fa-trash\"></i></a>\n" +
                                    "                          </td>\n" +
                                    "                      </tr>");
                            }
                            total();
                        }
                    });
                    if(found == false){
                        swal.fire("Plz Select a Product First");
                    }
                }

            }


        });

        function  total() {
            var amount = 0;
            $("tbody tr").each(function () {
                amount = parseInt($(this).find(".amount").val()) + amount;

            });
            $(".overall_text").html(amount);
            $(".overall").val(amount);
        }

        $("body").on("click",".remove",function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
            total();
        });
        $("body").on("click","#kt_btn",function (e) {
            e.preventDefault();
            var products = false;
            $("tbody tr").each(function () {
                products = true;
            });
            if(products == true){
                document.getElementById('client_add_form').submit();
            }else{
                swal.fire("Plz Add Items to Cart First");
            }

        });
    </script>
@endsection
