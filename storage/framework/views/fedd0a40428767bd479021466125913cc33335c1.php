<?php
$setting = \App\Models\Setting::pluck('value', 'name')->toArray();
$auth_logo = isset($setting['auth_logo']) ? 'uploads/' . $setting['auth_logo'] : 'assets/media/logos/logo-light.png';
$auth_page_heading = isset($setting['auth_page_heading']) ? $setting['auth_page_heading'] : 'wwww.webexert.com';
$auth_image = isset($setting['auth_image']) ? 'uploads/' . $setting['auth_image'] : 'assets/media/svg/illustrations/login-visual-1.svg';
$agent_fixed_price = isset($setting['agent_fixed_price']) ? $setting['agent_fixed_price'] : '20.00';
$company_fixed_price = isset($setting['company_fixed_price']) ? $setting['company_fixed_price'] : '135.00';
$file_anual_fixed_price = isset($setting['file_anual_fixed_price']) ? $setting['file_anual_fixed_price'] : '35.00';

$copy_right = isset($setting['copy_right']) ? $setting['copy_right'] : 'wwww.webexert.com';
$stripe_client = isset($setting['stripe_client']) ? $setting['stripe_client'] : 'pk_test_0EgBbBMGnb4kCquzWTPh6dKC00glHV9dZS';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
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

        #located thead tr th {
            font-size: 10px;
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
                            

                        </div>
                        <div class="d-print-none card-toolbar">
                            <a style="background: #557D60; color: white;" href="<?php echo e(route('orders')); ?>"
                                class="btn btn-light-primary
                        font-weight-bolder mr-2">
                                <i class="ki ki-long-arrow-back icon-sm" style="color: white;"></i>Back
                            </a>
                            <button class="btn btn-default" onClick="window.print()"
                                style="background: #557D60; color: white;">Print this page</button>

                            





                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!--begin::Form-->
                        <?php echo e(Form::model($user, ['method' => 'PATCH', 'route' => ['orders.update', $user->id], 'class' => 'form', 'id' => 'client_update_form', 'enctype' => 'multipart/form-data'])); ?>

                        <?php echo csrf_field(); ?>

                        <h3 class="card-label">Personal Detais</h3>

                        <div style="border: 1px solid #c5c4c4; border-radius: 20px; padding: 12px;margin: 25px 0px;">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="p_p">First Name</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right"><?php echo e($user->first_name); ?></p>
                                        </div>

                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">Mailing Address</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right"><?php echo e($user->mailing_address); ?></p>
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">City</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right"><?php echo e($user->city); ?></p>
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">Country</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right"><?php echo e($user->country); ?></p>
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">Email</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right"><?php echo e($user->email); ?></p>
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
                                            <p class="align-right"><?php echo e($user->last_name); ?></p>
                                        </div>

                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">Zip Postal Code</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right"><?php echo e($user->zip_postal_code); ?></p>
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">State/Province</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right"><?php echo e($user->state_province); ?></p>
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <p class="p_p">Phone Number</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="align-right"><?php echo e($user->phone_number); ?></p>
                                        </div>
                                        <div class="col-md-4"></div>


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
                                            <p class="align-right"><?php echo e($user->company_name); ?></p>
                                        </div>

                                        <div class="col-md-2"></div>

                                        <div class="col-md-5">
                                            <p class="p_p">Order Type</p>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="flex-container">
                                                <p class="align-right">
                                                    <?php if($user->order_type == 1): ?>
                                                        Registered Agent
                                                    <?php elseif($user->order_type == 0): ?>
                                                        Start A Company
                                                    <?php else: ?>
                                                        register-agent-renewal
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>

                                        <div class="col-md-5">
                                            <p class="p_p">Company Mailling Address</p>
                                        </div>
                                       
                                        <div class="col-md-5">
                                            <p class="align-right"><?php echo e($user->company_mailing_address); ?></p>
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
                                            <p class="align-right"><?php echo e($user->type_of_business); ?></p>
                                        </div>
                                        <div class="col-md-2"></div>

                                        <div class="col-md-5" style="visibility: hidden;">ddf</div>
                                        <div class="col-md-5" style="visibility: hidden;">fdsfdsf</div>
                                        <div class="col-md-2" style="visibility: hidden;">fdss</div>

                                        <div class="col-md-5">
                                            <p class="p_p">Company Physical Address</p>
                                        </div>
                                        <div class="col-md-5">
                                            <p class="align-right"><?php echo e($user->physical_address); ?></p>
                                        </div>
                                        <div class="col-md-2"></div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if(count($user->sharetypes) || count($user->compmanagment) || count($user->managements)): ?>
                            <h3 class="card-label">Authorized Officials</h3>
                            <div class="row"
                                style="border: 1px solid #c5c4c4; border-radius: 20px; padding: 12px;margin: 25px 0px;">

                                <div class="col-md-12 mt-3">

                                    
                                    <?php if(count($user->sharetypes) > 0): ?>
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

                                                <?php $__currentLoopData = $user->sharetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($share->type); ?></td>
                                                        <td><?php echo e($share->share_number); ?></td>
                                                        <td><?php echo e($share->share_value); ?></td>

                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>

                                    
                                    <?php if(count($user->compmanagment) > 0): ?>
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

                                                <?php $__currentLoopData = $user->compmanagment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($manag->type); ?></td>
                                                        <td><?php echo e($manag->first_name); ?></td>
                                                        <td><?php echo e($manag->last_name); ?></td>
                                                        <td><?php echo e($manag->address); ?></td>

                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>

                                    
                                    <?php if(count($user->managements) > 0): ?>
                                        <table class="table">
                                            <h3>Management</h3>
                                            <thead>
                                                <tr style="background: var(--primary-normal, #557D60); color: #fff;">
                                                    <th>Management</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Exempt Status</th>
                                                    
                                                    <th>Address to Record with State</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $__currentLoopData = $user->managements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $management): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($management->type); ?></td>
                                                        <td><?php echo e($management->first_name); ?></td>
                                                        <td><?php echo e($management->last_name); ?></td>
                                                        <td><?php echo e($management->np_exempt_status == 1 ? 'Yes' : 'No'); ?></td>
                                                        
                                                        <td><?php echo e($management->address_to_record_with_state); ?></td>

                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>



                                </div>

                            </div>
                        <?php endif; ?>


                        <?php if($user->agentrenewal): ?>
                            <h3 class="card-label">Enter Assets Located In Wyoming</h3>

                            <div style="border: 1px solid #c5c4c4; border-radius: 20px; padding: 12px;margin: 25px 0px;">
                                

                                <table class="table table-responsive" id="located">
                                    <thead>
                                        <tr>
                                            <th>Cash</th>
                                            <th>Trade Notes</th>
                                            <th>Sub Allowance</th>
                                            <th>Accounts Receivable</th>
                                            <th>U.S Government Oblig</th>
                                            <th>Tax Securities</th>
                                            <th>Other Current Assets</th>
                                            <th>Loans to Stockholders</th>
                                            <th>M & RS Loans</th>
                                            <th>Other Investments</th>
                                            <th>B & Other</th>
                                            <th>Depietable Assets</th>
                                            <th>Land</th>
                                            <th>Intangible Assets</th>
                                            <th>Accumulated</th>
                                            <th>Inte Assets - Acc</th>
                                            <th>Other Assets</th>
                                            <th>Total Assets</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo e($user->agentrenewal->cash); ?></td>
                                            <td><?php echo e($user->agentrenewal->tradeNotesInput); ?></td>
                                            <td><?php echo e($user->agentrenewal->allowanceInput); ?></td>
                                            <td><?php echo e($user->agentrenewal->accountsReceivable); ?></td>
                                            <td><?php echo e($user->agentrenewal->governmentObligations); ?></td>
                                            <td><?php echo e($user->agentrenewal->securities); ?></td>
                                            <td><?php echo e($user->agentrenewal->currentAssets); ?></td>
                                            <td><?php echo e($user->agentrenewal->loans); ?></td>
                                            <td><?php echo e($user->agentrenewal->mortgage); ?></td>
                                            <td><?php echo e($user->agentrenewal->otherInvestments); ?></td>
                                            <td><?php echo e($user->agentrenewal->buildings); ?></td>
                                            <td><?php echo e($user->agentrenewal->depietableAssets); ?></td>
                                            <td><?php echo e($user->agentrenewal->land); ?></td>
                                            <td><?php echo e($user->agentrenewal->intangibleAssets); ?></td>
                                            <td><?php echo e($user->agentrenewal->accumulatedAmortization); ?></td>
                                            <td><?php echo e($user->agentrenewal->intangibleAmortization); ?></td>
                                            <td><?php echo e($user->agentrenewal->otherAssets); ?></td>
                                            <td><?php echo e($user->agentrenewal->totalAssetsValue); ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        <?php endif; ?>

                        <h3>Order Summary</h3>

                        <div class="row"
                            style="border: 1px solid #c5c4c4; border-radius: 20px; padding: 12px;margin: 10px 0px;">

                            <table class="table" style="border-collapse: separate; border-spacing: 0 0;">
                                <tr>

                                    <?php if($user->order_type == 0): ?>
                                        <td style="border: none; padding: 12px;">
                                            <h6>Form a New Company (<?php echo e($user->type_of_business); ?>)</h6>
                                        </td>
                                        <td style="border: none; padding: 12px;">
                                            <h6 id="agent_price">$<?php echo e($company_fixed_price); ?></h6>
                                        </td>
                                    <?php elseif($user->order_type == 1): ?>
                                        <td style="border: none; padding: 12px;">
                                            <h6>Registered Agent for WY (<?php echo e($user->type_of_business); ?>)</h6>
                                        </td>
                                        <td style="border: none; padding: 12px;">
                                            <h6 id="agent_price">$<?php echo e($agent_fixed_price); ?></h6>
                                        </td>
                                    <?php else: ?>
                                        <?php if($user->total > 0): ?>
                                <tr>
                                    <td style="border: none; padding: 12px;">
                                        <h6>File Annual Report</h6>
                                    </td>
                                    <td style="border: none; padding: 12px;">
                                        <h6 id="agent_price">$<?php echo e($file_anual_fixed_price); ?></h6>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td style="border: none; padding: 12px;">
                                        <h6>Total Assets Fees</h6>
                                    </td>
                                    <td style="border: none; padding: 12px;">
                                        <h6 id="agent_price">$<?php echo e($user->tot_assets_fee); ?></h6>
                                    </td>
                                </tr>
                                <?php endif; ?>

                                </tr>
                                <?php if(count($user->orderitems) > 0): ?>
                                    <?php $__currentLoopData = $user->orderitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sitems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <h6><?php echo e($sitems->serviceitems->name); ?></h6>
                                            </td>
                                            <td>
                                                <h6>$<?php echo e($sitems->amount); ?></h6>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <tr>
                                    <td>
                                        <h4 class="font-weight-bold">Order Total:</h4>
                                    </td>
                                    <td>
                                        <h4 class="font-weight-bold">$<?php echo e($user->total); ?></h4>
                                    </td>
                                </tr>
                            </table>

                        </div>

                        <?php if(count($user->documents) > 0): ?>
                            <h3 class="card-label">Company Documents</h3>
                            <div class="row"
                                style="border: 1px solid #c5c4c4; border-radius: 20px; padding: 12px;margin: 25px 0px;">

                                <?php $__currentLoopData = $user->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <i class="far fa-file-pdf pdf-icon"></i>
                                                </h5>
                                                <p class="card-text">Uploaded on: <?php echo e($doc->created_at->format('M d, Y')); ?>

                                                </p>
                                                <a href="<?php echo e(asset($doc->document)); ?>" class="btn btn-primary"
                                                    target="_blank"
                                                    style="background: #557D60; color: white; border: 1px solid #557D60;">Download</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        <?php endif; ?>

                        <?php echo e(Form::close()); ?>

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

                                    <form action="<?php echo e(route('admin.store.document')); ?>" method="POST"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <input type="hidden" name="order_id" value="<?php echo e($user->id); ?>">

                                        <div class="form-group">
                                            <label for="">Document</label>
                                            <input type="file" name="document" class="form-control" required>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">Close</button>

                                    <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/wer/Documents/Synet/wayoming/resources/views/client/orders/single.blade.php ENDPATH**/ ?>