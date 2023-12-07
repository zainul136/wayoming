<?php
$setting = \App\Models\Setting::pluck('value','name')->toArray();
$auth_logo = isset($setting['auth_logo']) ? 'uploads/'.$setting['auth_logo'] : 'assets/media/logos/logo-light.png';
$auth_page_heading = isset($setting['auth_page_heading']) ? $setting['auth_page_heading'] : 'wwww.webexert.com';
$auth_image = isset($setting['auth_image']) ? 'uploads/'.$setting['auth_image'] : 'assets/media/svg/illustrations/login-visual-1.svg';
$agent_fixed_price = isset($setting['agent_fixed_price']) ? $setting['agent_fixed_price'] : '20.00';
$company_fixed_price = isset($setting['company_fixed_price']) ? $setting['company_fixed_price'] : '135.00';

$copy_right = isset($setting['copy_right']) ? $setting['copy_right'] : 'wwww.webexert.com';
$stripe_client = isset($setting['stripe_client']) ? $setting['stripe_client'] : 'pk_test_0EgBbBMGnb4kCquzWTPh6dKC00glHV9dZS';
?>
<?php $__env->startSection('title',$title); ?>
<?php $__env->startSection('content'); ?>
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
            <div class="d-print-none card-toolbar">
                <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-light-primary
              font-weight-bolder mr-2">
                    <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

                    <button class="btn btn-primary" onClick="window.print()">Print this page</button>

                    
        


            </div>
          </div>
          <div class="card-body">
          <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!--begin::Form-->
            <?php echo e(Form::model($user, [ 'method' => 'PATCH','route' => ['orders.update', $user->id],'class'=>'form' ,"id"=>"client_update_form", 'enctype'=>'multipart/form-data'])); ?>

              <?php echo csrf_field(); ?>
              <div class="row">
<!-- 






 -->
                  <table class="table">
                      <tr>
                          <th>First Name</th>
                          <td><?php echo e($user->first_name); ?></td>
                      </tr>
                      <tr>
                          <td>Last name</td>
                          <td><?php echo e($user->last_name); ?></td>
                      </tr>

                      <tr>
                          <td>MailingAddress</td>
                          <td><?php echo e($user->mailing_address); ?></td>
                      </tr>
                      <tr>
                          <td>Zip Postal Code</td>
                          <td><?php echo e($user->zip_postal_code); ?></td>
                      </tr>

                      <tr>
                          <td>City</td>
                          <td><?php echo e($user->city); ?></td>
                      </tr>
                      <tr>
                          <td>StateProvince</td>
                          <td><?php echo e($user->state_province); ?></td>
                      </tr>
                      <tr>
                          <td>Country</td>
                          <td><?php echo e($user->country); ?></td>
                      </tr>
                      <tr>
                          <td>PhoneNumber</td>
                          <td><?php echo e($user->phone_number); ?></td>
                      </tr>
                      <tr>
                          <td>Email</td>
                          <td><?php echo e($user->email); ?></td>
                      </tr>
                      <tr>
                          <td>AttorneyFirstName</td>
                          <td><?php echo e($user->attorney_first_name); ?></td>
                      </tr>
                      <tr>
                          <td>AttorneyLastName</td>
                          <td><?php echo e($user->attorney_last_name); ?></td>
                      </tr>
                      <tr>
                          <td>AttorneyMailingAddress</td>
                          <td><?php echo e($user->attorney_mailing_address); ?></td>
                      </tr>
                      <tr>
                          <td>CompanyName</td>
                          <td><?php echo e($user->company_name); ?></td>
                      </tr>
                      <tr>
                          <td>Type of Business</td>
                          <td><?php echo e($user->type_of_business); ?></td>
                      </tr>
                      <!-- <tr>
                          <td>Company Physical Address</td>
                          <td><?php echo e($user->company_physical_address); ?></td>
                      </tr>
                      <tr>
                          <td>Company Mailing Address</td>
                          <td><?php echo e($user->company_mailing_address); ?></td>
                      </tr> -->
                      <tr>
                          <td>Order Type</td>
                          <td><?php echo e(($user->order_type == 1)?'Registered Agent':'Start A Company'); ?></td>
                      </tr>



                      <tr>
                          <th>Payment Status</th>
                          <td>
                              <?php if($user->payment_status == 1): ?>
                                  <label class="label label-success label-inline mr-2">Paid</label>
                              <?php elseif($user->payment_status == 0): ?>
                                  <label class="label label-info label-inline mr-2">Payment is pending</label>
                              <?php elseif($user->payment_status == 2): ?>
                                  <label class="label label-danger label-inline mr-2">Cancel</label>
                              <?php endif; ?>
                          </td>
                      </tr>

                  </table>
                  <table class="table">
                      <thead>
                      <tr class="bg-light-info">
                          <th>Item Detail</th>
                          <th>Quantity</th>
                          <th>price</th>
                          <th>Amount</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $user->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td><?php echo e($item->Description); ?></td>
                                <td><?php echo e(1); ?></td>
                                <td>$<?php echo e($item->amount); ?></td>
                                <td>$<?php echo e(round($item->amount ,2)); ?></td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                      </tbody>
                     
                      <tr class="bg-light-info">
                          <th colspan="3">Fixed Price</th>
                     <?php if($user->order_type == 1): ?>
                          <td >$<?php echo e($agent_fixed_price); ?></td>
                    <?php elseif($user->order_type == 0): ?>
                    <td >$<?php echo e($company_fixed_price); ?></td>
                    <?php endif; ?>
                       
                      </tr>
                     
                      <tfoot>
                      <tr class="bg-light-success">
                          <th colspan="3">Total</th>
                          <td >$<?php echo e(round($user->total,2)); ?></td>
                      </tr>
                      </tfoot>
                   
                  </table>

                  <table class="table">
                      <thead>
                      <tr class="bg-light-info">
                          <th>Management</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Type Non-Profit</th>
                          <th>Exempt Status</th>
                          <th>Number Share</th>
                          <th>Value Share</th>
                          <th>Address to Record with State</th>
                      </tr>
                      </thead>
                      <tbody>

                        <?php $__currentLoopData = $user->managements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $management): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td><?php echo e($management->type); ?></td>
                                <td><?php echo e($management->first_name); ?></td>
                                <td><?php echo e($management->last_name); ?></td>
                                <td><?php echo e($management->np_corp_type); ?></td>
                                <td><?php echo e(($management->np_exempt_status == 1)?'Yes':'No'); ?></td>
                                <td><?php echo e($management->number_share); ?></td> 
                                <td><?php echo e($management->value_share); ?></td>
                                <td><?php echo e($management->address_to_record_with_state); ?></td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                  </table>


              </div>
          <?php echo e(Form::close()); ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection("scripts"); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp3\htdocs\wyoming_services\resources\views/admin/orders/single.blade.php ENDPATH**/ ?>