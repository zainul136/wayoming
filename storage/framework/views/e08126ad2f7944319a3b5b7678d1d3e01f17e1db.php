<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
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
                                <a href="" class="text-muted">Order Request</a>
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
                    <h3 class="card-label">Order Request List</h3>

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
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="clientOrderTable"
                        style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>Company Name</th>
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
                            <?php if(isset($order_requests)): ?>
                                <?php $__currentLoopData = $order_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $history[$loop->index]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><strong>From:-</strong><?php echo e($order_history->company_name); ?>

                                                <strong>To:-</strong><?php echo e($req->company_name); ?>

                                            </td>
                                            <td><strong>From:-</strong><?php echo e($order_history->first_name); ?>

                                                <strong>To:-</strong><?php echo e($req->first_name); ?>

                                            </td>
                                            <td><strong>From:-</strong><?php echo e($order_history->last_name); ?>

                                                <strong>To:-</strong><?php echo e($req->last_name); ?>

                                            </td>
                                            <td><strong>From:-</strong><?php echo e($order_history->email); ?>

                                                <strong>To:-</strong><?php echo e($req->email); ?>

                                            </td>
                                            <td><strong>From:-</strong><?php echo e($order_history->country); ?>

                                                <strong>To:-</strong><?php echo e($req->country); ?>

                                            </td>
                                            <td><strong>From:-</strong><?php echo e($order_history->phone_number); ?>

                                                <strong>To:-</strong><?php echo e($req->phone_number); ?>

                                            </td>
                                            <td><strong>From:-</strong><?php echo e($order_history->city); ?>

                                                <strong>To:-</strong><?php echo e($req->city); ?>

                                            </td>
                                            <td><?php echo e($req->created_at); ?></td>
                                            <td>
                                                <?php if($req->status == 0): ?>
                                                    <span class="label label-info label-inline mr-2">Pending</span>
                                                <?php else: ?>
                                                    <span class="label label-success label-inline mr-2">Approved</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-clean btn-icon dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fi fi-br-menu-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item btn-approve" href="#"
                                                            data-id="<?php echo e($req->id); ?>" data-action="approve">
                                                            <i class="flaticon-check"></i> Approve
                                                        </a>
                                                        <a class="dropdown-item btn-reject" href="#"
                                                            data-id="<?php echo e($req->id); ?>" data-action="reject">
                                                            <i class="flaticon-cross"></i> Reject
                                                        </a>
                                                        <!-- Other dropdown items can be added here -->
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>

                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>
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

            $('#clientOrderTbody').on('click', '.btn-approve, .btn-reject', function(e) {
                e.preventDefault();

                var id = $(this).data("id");
                var action = $(this).data("action");

                var button = $(this); // Store the button element
                /// Store the original button text
                var originalButtonText = button.html();

                // Change the button text to "Waiting..."
                button.html('<i class="spinner-border spinner-border-sm" role="status"></i> Waiting...')
                    .prop('disabled', true);

                $.ajax({
                    url: '<?php echo e(route('admin.request.approved')); ?>',
                    type: 'get',
                    async: false,
                    dataType: 'json',
                    data: {
                        id: id,
                        action: action
                    },
                    success: function(response) {

                        // Hide loading indicator on success
                        $('#loading-indicator').hide();

                        if (response.status == 200) {
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    },
                    error: function() {
                        // Hide loading indicator on success
                        $('#loading-indicator').hide();
                        alert('Something went wrong');
                    },
                    complete: function() {
                        // Change button text back to the original text
                        button.html(originalButtonText).prop('disabled', false);
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/ryulgomy/public_html/wyoming/resources/views/admin/orders/order_requests.blade.php ENDPATH**/ ?>