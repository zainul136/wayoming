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
                                <a href="" class="text-muted">Orders</a>
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
                    <h3 class="card-label">Order List</h3>

                </div>

                <div class="card-header">

                </div>


                <div class="card-toolbar">

                </div>
            </div>
            <div class="card-body">
                <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                <div class="">
                    <form action="<?php echo e(route('admin.delete-selected-orders')); ?>" method="post" id="client_form">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" id="clients"
                            style="margin-top: 13px !important">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Company Name</th>
                                    <th>Order Type</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if(isset($agent_orders)): ?>
                                    <?php $__currentLoopData = $agent_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($order->user->name); ?></td>
                                            <td><?php echo e($order->company_name); ?></td>
                                            <td>
                                                <?php if($order->order_type == 1): ?>
                                                    Registered Agent
                                                <?php elseif($order->order_type == 0): ?>
                                                    Start A Company
                                                <?php else: ?>
                                                    Renewal
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($order->payment_status == 0): ?>
                                                    <span class="label label-info label-inline mr-2">Payment is pending</span>
                                                <?php elseif($order->payment_status == 1): ?>
                                                    <span class="label label-success label-inline mr-2">Paid</span>
                                                <?php elseif($order->payment_status == 2): ?>
                                                    <span class="label label-danger label-inline mr-2">Cancel</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>$<?php echo e($order->total); ?></td>
                                            <td><?php echo e($order->created_at); ?></td>
                                            <div>
                                                <td>

                                                    <a title="Show Order" class="btn btn-sm btn-clean btn-icon"
                                                        href="<?php echo e(url('admin/orders-show/' . $order->id)); ?>">
                                                        <i class="icon-1x text-dark-50 flaticon-eye"></i>
                                                    </a>

                                                    <a title="Show Order" class="btn btn-sm btn-clean btn-icon"
                                                        href="<?php echo e(url('admin/edit-orders/' . $order->id)); ?>">
                                                        <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                                    </a>

                                                </td>
                                            </div>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </form>
                    <!--end: Datatable-->
                </div>
            </div>
            <!-- Modal-->
            <div class="modal fade" id="clientModel" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdrop" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Kid Detail</h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold"
                                data-dismiss="modal">Close</button>
                        </div>
                    </div>
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
        $(document).on('click', 'th input:checkbox', function() {

            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function() {
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });
        });

        var clients = $('#clients').DataTable({
            "order": [
                [1, 'asc']
            ],
        });

        // var clients = $('#clients').DataTable({
        //     "order": [
        //         [1, 'asc']
        //     ],
        //     "processing": true,
        //     "serverSide": true,
        //     "searchDelay": 500,
        //     "responsive": true,
        //     "ajax": {
        //         "url": "<?php echo e(route('admin.getOrders')); ?>",
        //         "dataType": "json",
        //         "type": "POST",
        //         "data": function(d) {
        //             d._token = "<?php echo e(csrf_token()); ?>";
        //             d.order_type_filter = $("#order-type-filter").val();
        //             d.payment_status_filter = $("#payment-status-filter").val();
        //             d.date_filter = $("#date-filter").val();
        //         },
        //     },
        //     "columns": [{
        //             "data": "first_name"
        //         },
        //         {
        //             "data": "company_name"
        //         },
        //         {
        //             "data": "order_type",

        //         },
        //         {
        //             "data": "payment_status"

        //         },
        //         {
        //             "data": "total"
        //         },
        //         {
        //             "data": "created_at"

        //         },
        //         {
        //             "data": "action",
        //             "searchable": false,
        //             "orderable": false
        //         }
        //     ]
        // });

        // $("#apply-filters").on("click", function() {
        //     clients.ajax.reload();
        // });


        function del_selected() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    Swal.fire(
                        "Deleted!",
                        "Your school has been deleted.",
                        "success"
                    );
                    $("#client_form").submit();
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/wer/Documents/Synet/wayoming/resources/views/admin/orders/agent_register.blade.php ENDPATH**/ ?>