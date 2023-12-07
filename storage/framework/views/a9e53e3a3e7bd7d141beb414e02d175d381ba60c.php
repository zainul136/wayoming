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
                <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="">

                    <!--Personal Detail Table-->
                    <table class="table table-bordered table-hover table-checkable" id="clientOrderTable"
                        style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Type Of Business</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Created At</th>
                                
                                <th>Actions</th>
                            </tr>
                        </thead>


                        <tbody id="clientOrderTbody">
                            <?php if(isset($data['order_pending'])): ?>
                                <?php $__currentLoopData = $data['order_pending']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($order->company_name); ?></td>
                                        <td><?php echo e($order->type_of_business); ?></td>
                                        <td><?php echo e($order->first_name. ' '.$order->last_name); ?></td>

                                        <td><?php echo e($order->email); ?></td>
                                        <td><?php echo e($order->country); ?></td>
                                        <td><?php echo e($order->phone_number); ?></td>
                                        <td><?php echo e($order->city); ?></td>
                                        <td><?php echo e($order->created_at); ?></td>
                                        
                                        <td>
                                            <a href="<?php echo e(route('admin.view.changes', ['order_id' => $order->id])); ?>"
                                                class="btn btn-primary btn-sm" style="background: #557D60; border: 0px;">View</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>

                    </table>
                    <!--Personal Detail Table-->

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
        var csrfToken = "<?php echo e(csrf_token()); ?>";
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
                    url: '<?php echo e(route('admin.request.approved.personal')); ?>',
                    data: JSON.stringify(dataToSend),
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        if (response.status == 200) {
                            setTimeout(() => {
                                return route('admin.orders.edit.pending');
                            }, 2000);

                            $('.btn-approve').prop('disabled', false);
                        }

                        if (response.status == 400) {
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/wer/Documents/Synet/wayoming/resources/views/admin/orders/order_edit_pending_requests.blade.php ENDPATH**/ ?>