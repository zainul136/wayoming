
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

    <style>
        .dataTables_wrapper .dataTables_paginate .pagination .page-item.active>.page-link {
            background: #557D60;
            color: #ffffff;
        }

        .ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 105px;
            cursor: pointer;
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
                                <a href="" class="text-muted">Edit Request Approval Reject</a>
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
                    <h3 class="card-label">Edit Request Approval Reject</h3>

                </div>
                <div class="card-toolbar">

                    <!--begin::Button-->

                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>Order Type</th>
                                <th>Company Name</th>
                                <th>Business Type</th>
                                <th>Status</th>
                                <th>Reason</th>
                            </tr>
                        </thead>

                        <tbody id="editRequestTable">
                            <?php if(isset($allUpdateRequest)): ?>
                                <?php $__currentLoopData = $allUpdateRequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php if($reject['order_type'] == 0): ?>
                                                Start A Company
                                            <?php elseif($reject['order_type'] == 1): ?>
                                                Registered Agent
                                            <?php else: ?>
                                                Renewal
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo e($reject['company_name']); ?>

                                        </td>
                                        <td>
                                            <?php echo e($reject['type_of_business']); ?>

                                        </td>
                                        <td>
                                            <?php if($reject['status'] == 0): ?>
                                                <span class="badge badge-danger">Not Approved</span>
                                            <?php else: ?>
                                                <span class="badge badge-success">Approved</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="resonShow" id="resonShow" data-id="<?php echo e($reject['notapproved']['order_id'] ?? ''); ?>">
                                            <?php if($reject['status'] == 0): ?>
                                                <div class="ellipsis" id="ellipsis">
                                                    <?php echo e($reject['notapproved']['reason'] ?? ''); ?>

                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>

                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>


    <!-- View Reason Modal Start -->
    <div class="modal fade" id="showFullContent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Resson Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p id="full-content"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- View Reason Modal End -->

    <!--end::Card-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('stylesheets'); ?>
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <!--begin::Page Vendors(used by this page)-->
    <script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
    <!--end::Page Vendors-->
    <script>
        $(document).ready(function() {

            $('#editRequestTable').on('click', '.resonShow', function() {

                var order_id = $(this).attr('data-id');

                // Make an Ajax request
                $.ajax({
                    url: '<?php echo e(route('client.get.content')); ?>',
                    type: 'GET',
                    data: {
                        order_id: order_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.ordersupdatedetail.status);

                        if (response.ordersupdatedetail.status === 0) {
                            $('#showFullContent').modal('show');
                            $('#full-content').html(response.reason);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors if the Ajax request fails
                        console.error(error);
                    }
                });
            });


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/ryulgomy/public_html/wyoming/resources/views/client/orders/approvel_reject.blade.php ENDPATH**/ ?>