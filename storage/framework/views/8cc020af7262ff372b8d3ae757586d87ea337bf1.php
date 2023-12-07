<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

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
                <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="">

                    <?php if(
                        $data['order_previous']->orderupdate->count() > 0 ||
                            $data['order_previous']->companymanagementupdate->count() ||
                            $data['order_previous']->shareupdate->count() > 0 ||
                            $data['order_previous']->managementupdate->count() > 0 ||
                            $data['order_previous']->renewalupdate->count() > 0): ?>
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
                    <?php endif; ?>

                    
                    <?php if($data['order_previous']->orderupdate->count() > 0): ?>
                        <div class="row">
                            <h5 class="font-weight-bold heading">Personal Details</h5>
                        </div>

                        <input type="hidden" name="order_id" value="<?php echo e($data['order_previous']->id); ?>"
                            data-id="<?php echo e($data['order_previous']->id); ?>" data-personal="personal">
                        <input type="hidden" name="cmanage" data-cmanage="cmanage">
                        <input type="hidden" name="sharetype" data-sharetype="sharetype">
                        <input type="hidden" name="omanage" data-omanage="omanage">
                        <input type="hidden" name="renewal" data-renewal="renewal">

                        <div class="row justify-content-center">
                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;First Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->first_name); ?></span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Last Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->last_name); ?></span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Email:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->email); ?></span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Country:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->country); ?></span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Phone:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->phone_number); ?></span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Mailing Address:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->mailing_address); ?></span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Zip/Postal:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->zip_postal_code); ?></span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;City:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->city); ?></span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;State Province:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->state_province); ?></span>
                                    </div>
                                </div>
                            </div>
                            


                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;First Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->first_name != $data['order_new']->first_name): ?>
                                            <span class="hilight"><?php echo e($data['order_new']->first_name); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new']->first_name); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;last Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->last_name != $data['order_new']->last_name): ?>
                                            <span class="hilight"><?php echo e($data['order_new']->last_name); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new']->last_name); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Email:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->email != $data['order_new']->email): ?>
                                            <span class="hilight"><?php echo e($data['order_new']->email); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new']->email); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Country:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->country != $data['order_new']->country): ?>
                                            <span class="hilight"><?php echo e($data['order_new']->country); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new']->country); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Phone:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->phone_number != $data['order_new']->phone_number): ?>
                                            <span class="hilight"><?php echo e($data['order_new']->phone_number); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new']->phone_number); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Mailing Address:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->mailing_address != $data['order_new']->mailing_address): ?>
                                            <span class="hilight"><?php echo e($data['order_new']->mailing_address); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new']->mailing_address); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Zip/Postal:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->zip_postal_code != $data['order_new']->zip_postal_code): ?>
                                            <span class="hilight"><?php echo e($data['order_new']->zip_postal_code); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new']->zip_postal_code); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;City:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->city != $data['order_new']->city): ?>
                                            <span class="hilight"><?php echo e($data['order_new']->city); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new']->city); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;State/Province:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->state_province != $data['order_new']->state_province): ?>
                                            <span class="hilight"><?php echo e($data['order_new']->state_province); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new']->state_province); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        


                        
                        <div class="row">
                            <h5 class="font-weight-bold heading">Company Details</h5>
                        </div>
                        <div class="row justify-content-center">
                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Company Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->company_name); ?></span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Type Of Business:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->type_of_business); ?></span>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Order Type:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->order_type == 0): ?>
                                            Start A Company
                                        <?php elseif($data['order_previous']->order_type == 1): ?>
                                            Registered Agent
                                        <?php else: ?>
                                            Renewal
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            


                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Company Name:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->company_name != $data['order_new']->company_name): ?>
                                            <span class="hilight"><?php echo e($data['order_new']->company_name); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new']->company_name); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Type Of Business:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->type_of_business != $data['order_new']->type_of_business): ?>
                                            <span class="hilight"><?php echo e($data['order_new']->type_of_business); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new']->type_of_business); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Order Type:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_new']->order_type == 0): ?>
                                            <span> Start A Company</span>
                                        <?php elseif($data['order_new']->order_type == 1): ?>
                                            <span>Registered Agent</span>
                                        <?php else: ?>
                                            Renewal
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    <?php endif; ?>
                    



                    
                    <?php if($data['order_previous']->companymanagementupdate->count() > 0): ?>
                        <div class="row">
                            <h5 class="font-weight-bold heading">Company Management</h5>
                        </div>
                        <div class="row justify-content-center">
                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                
                                <?php $__currentLoopData = $data['order_previous']->compmanagment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $from): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($from->type); ?></span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;First Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($from->first_name); ?></span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Last Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($from->last_name); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            


                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                
                                <?php $__currentLoopData = $data['order_previous']->companymanagementupdate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $to): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($to->type); ?></span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;First Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                                $isDifferent = true;
                                            ?>

                                            <?php $__currentLoopData = $data['order_previous']->compmanagment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $from): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($from->first_name === $to->first_name): ?>
                                                    <?php
                                                        $isDifferent = false;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($isDifferent): ?>
                                                <span class="hilight"><?php echo e($to->first_name); ?></span>
                                            <?php else: ?>
                                                <span><?php echo e($to->first_name); ?></span>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Last Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                                $isDifferent = true;
                                            ?>

                                            <?php $__currentLoopData = $data['order_previous']->compmanagment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $from): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($from->last_name === $to->last_name): ?>
                                                    <?php
                                                        $isDifferent = false;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($isDifferent): ?>
                                                <span class="hilight"><?php echo e($to->last_name); ?></span>
                                            <?php else: ?>
                                                <span><?php echo e($to->last_name); ?></span>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            
                        </div>
                    <?php endif; ?>
                    


                    
                    <?php if($data['order_previous']->shareupdate->count() > 0): ?>
                        <div class="row">
                            <h5 class="font-weight-bold heading">Share Type</h5>
                        </div>
                        <div class="row justify-content-center">

                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                
                                <?php $__currentLoopData = $data['order_previous']->sharetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $from): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($from->type); ?></span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Share Number:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($from->share_number); ?></span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Share Value:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($from->share_value); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            


                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                
                                <?php $__currentLoopData = $data['order_previous']->shareupdate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $to): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($to->type); ?></span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Share Number:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                                $isDifferent = true;
                                            ?>

                                            <?php $__currentLoopData = $data['order_previous']->sharetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $from): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($from->share_number === $to->share_number): ?>
                                                    <?php
                                                        $isDifferent = false;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($isDifferent): ?>
                                                <span class="hilight"><?php echo e($to->share_number); ?></span>
                                            <?php else: ?>
                                                <span><?php echo e($to->share_number); ?></span>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Share Value:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                                $isDifferent = true;
                                            ?>

                                            <?php $__currentLoopData = $data['order_previous']->sharetypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $from): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($from->share_value === $to->share_value): ?>
                                                    <?php
                                                        $isDifferent = false;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($isDifferent): ?>
                                                <span class="hilight"><?php echo e($to->share_value); ?></span>
                                            <?php else: ?>
                                                <span><?php echo e($to->share_value); ?></span>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            
                        </div>
                    <?php endif; ?>
                    


                    
                    <?php if($data['order_previous']->managementupdate->count() > 0): ?>
                        <div class="row">
                            <h5 class="font-weight-bold heading">Order Management</h5>
                        </div>
                        <div class="row justify-content-center">

                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                
                                <?php $__currentLoopData = $data['order_previous']->managements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $from): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($from->type); ?></span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;First Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($from->first_name); ?></span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Last Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($from->last_name); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            


                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                
                                <?php $__currentLoopData = $data['order_previous']->managementupdate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $to): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Type:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php echo e($to->type); ?></span>
                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;First Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                                $isDifferent = true;
                                            ?>

                                            <?php $__currentLoopData = $data['order_previous']->managements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $from): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($from->first_name === $to->first_name): ?>
                                                    <?php
                                                        $isDifferent = false;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($isDifferent): ?>
                                                <span class="hilight"><?php echo e($to->first_name); ?></span>
                                            <?php else: ?>
                                                <span><?php echo e($to->first_name); ?></span>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <div class="row inner_row">
                                        <div class="col-md-6">
                                            <span>&nbsp;Last Name:</span>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                                $isDifferent = true;
                                            ?>

                                            <?php $__currentLoopData = $data['order_previous']->managements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $from): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($from->last_name === $to->last_name): ?>
                                                    <?php
                                                        $isDifferent = false;
                                                    ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($isDifferent): ?>
                                                <span class="hilight"><?php echo e($to->last_name); ?></span>
                                            <?php else: ?>
                                                <span><?php echo e($to->last_name); ?></span>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            
                        </div>
                    <?php endif; ?>
                    


                    
                    <?php if($data['order_previous']->renewalupdate->count() > 0): ?>
                        <div class="row">
                            <h5 class="font-weight-bold heading">Ageent Renewal</h5>
                        </div>
                        <div class="row justify-content-center">
                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">From</h5>
                                </div>
                                
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Cash:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->cash); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;TradeNotesInput:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->tradeNotesInput); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;AllowanceInput:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->allowanceInput); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;AccountsReceivable:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->accountsReceivable); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;governmentObligations:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->governmentObligations); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Securities:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->securities); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;CurrentAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->currentAssets); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Loans:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->loans); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Mortgage:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->mortgage); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;OtherInvestments:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->otherInvestments); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Buildings:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->buildings); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;DepietableAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->depietableAssets); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Land:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->land); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;IntangibleAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->intangibleAssets); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;AccumulatedAmortization:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->accumulatedAmortization); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;IntangibleAmortization:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->intangibleAmortization); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;OtherAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->otherAssets); ?></span>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;TotalAssetsValue:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span><?php echo e($data['order_previous']->agentrenewal->totalAssetsValue); ?></span>
                                    </div>
                                </div>

                            </div>
                            


                            
                            <div class="col-md-5"
                                style="border: 1px solid #c5c4c4; border-radius: 10px; padding: 12px;margin: 20px 0px;">
                                <div class="row justify-content-center from_row">
                                    <h5 class="font-weight-bold" style="">To</h5>
                                </div>
                                
                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Cash:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->cash != $data['order_new_renewal']->cash): ?>
                                            <span class="hilight"><?php echo e($data['order_new_renewal']->cash); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->cash); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;TradeNotesInput:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->tradeNotesInput != $data['order_new_renewal']->tradeNotesInput): ?>
                                            <span class="hilight"><?php echo e($data['order_new_renewal']->tradeNotesInput); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->tradeNotesInput); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;AllowanceInput:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->allowanceInput != $data['order_new_renewal']->allowanceInput): ?>
                                            <span class="hilight"><?php echo e($data['order_new_renewal']->allowanceInput); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->allowanceInput); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;accountsReceivable:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->accountsReceivable != $data['order_new_renewal']->accountsReceivable): ?>
                                            <span
                                                class="hilight"><?php echo e($data['order_new_renewal']->accountsReceivable); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->accountsReceivable); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;GovernmentObligations:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->governmentObligations != $data['order_new_renewal']->governmentObligations): ?>
                                            <span
                                                class="hilight"><?php echo e($data['order_new_renewal']->governmentObligations); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->governmentObligations); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Securities:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->securities != $data['order_new_renewal']->securities): ?>
                                            <span class="hilight"><?php echo e($data['order_new_renewal']->securities); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->securities); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;CurrentAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->currentAssets != $data['order_new_renewal']->currentAssets): ?>
                                            <span class="hilight"><?php echo e($data['order_new_renewal']->currentAssets); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->currentAssets); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Loans:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->loans != $data['order_new_renewal']->loans): ?>
                                            <span class="hilight"><?php echo e($data['order_new_renewal']->loans); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->loans); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Mortgage:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->mortgage != $data['order_new_renewal']->mortgage): ?>
                                            <span class="hilight"><?php echo e($data['order_new_renewal']->mortgage); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->mortgage); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;OtherInvestments:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->otherInvestments != $data['order_new_renewal']->otherInvestments): ?>
                                            <span
                                                class="hilight"><?php echo e($data['order_new_renewal']->otherInvestments); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->otherInvestments); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Buildings:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->buildings != $data['order_new_renewal']->buildings): ?>
                                            <span class="hilight"><?php echo e($data['order_new_renewal']->buildings); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->buildings); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;DepietableAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->depietableAssets != $data['order_new_renewal']->depietableAssets): ?>
                                            <span
                                                class="hilight"><?php echo e($data['order_new_renewal']->depietableAssets); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->depietableAssets); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;Land:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->land != $data['order_new_renewal']->land): ?>
                                            <span class="hilight"><?php echo e($data['order_new_renewal']->land); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->land); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;IntangibleAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->intangibleAssets != $data['order_new_renewal']->intangibleAssets): ?>
                                            <span
                                                class="hilight"><?php echo e($data['order_new_renewal']->intangibleAssets); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->intangibleAssets); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;AccumulatedAmortization:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if(
                                            $data['order_previous']->agentrenewal->accumulatedAmortization !=
                                                $data['order_new_renewal']->accumulatedAmortization): ?>
                                            <span
                                                class="hilight"><?php echo e($data['order_new_renewal']->accumulatedAmortization); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->accumulatedAmortization); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;IntangibleAmortization:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->intangibleAmortization != $data['order_new_renewal']->intangibleAmortization): ?>
                                            <span
                                                class="hilight"><?php echo e($data['order_new_renewal']->intangibleAmortization); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->intangibleAmortization); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;OtherAssets:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->otherAssets != $data['order_new_renewal']->otherAssets): ?>
                                            <span class="hilight"><?php echo e($data['order_new_renewal']->otherAssets); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->otherAssets); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row inner_row">
                                    <div class="col-md-6">
                                        <span>&nbsp;TotalAssetsValue:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if($data['order_previous']->agentrenewal->totalAssetsValue != $data['order_new_renewal']->totalAssetsValue): ?>
                                            <span
                                                class="hilight"><?php echo e($data['order_new_renewal']->totalAssetsValue); ?></span>
                                        <?php else: ?>
                                            <span><?php echo e($data['order_new_renewal']->totalAssetsValue); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    <?php endif; ?>
                    

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
                <form action="<?php echo e(route('admin.approval.reject')); ?>" method="POST">

                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="order_id" value="<?php echo e($data['order_previous']->id); ?>">

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('stylesheets'); ?>
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendors Styles-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <!--begin::Page Vendors(used by this page)-->
    <script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
    <!--end::Page Vendors-->
    <script>
        var csrfToken = "<?php echo e(csrf_token()); ?>";
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
                    url: '<?php echo e(route('admin.request.approved.personal')); ?>',
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/ryulgomy/public_html/wyoming/resources/views/admin/orders/view_changes.blade.php ENDPATH**/ ?>