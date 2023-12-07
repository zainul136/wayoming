<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<style>
    .dataTables_wrapper .dataTables_paginate .pagination .page-item.active > .page-link{
        background: #557D60;
        color: #ffffff;
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
                                <th>Order Typess</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

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

            getClientOrders();

            function getClientOrders() {

                $.ajax({

                    url: '<?php echo e(route('client.orders')); ?>',
                    type: 'get',
                    async: false,
                    dataType: 'json',

                    success: function(data) {


                        var dataTable = $('#clientOrderTable').DataTable({
                            data: data,
                            columns: [
                                // {
                                //     data: 'user.name'
                                // },
                                {
                                    data: 'company_name'
                                },
                                {
                                    data: 'order_type',
                                    render: function(data, type, row) {
                                        if (data === 1) {
                                            return 'Registered Agent';
                                        } else if(data == 0) {
                                            return 'Start A Company';
                                        }else{
                                            return 'Renewal';
                                        }
                                    }
                                },
                                {
                                    data: 'payment_status',
                                    render: function(data, type, row) {
                                        if (data === 0) {
                                            return '<span class="label label-info label-inline mr-2">Payment is pending</span>';
                                        } else if (data === 1) {
                                            return '<span class="label label-success label-inline mr-2" style="background: #557D60;color: #ffff;opacity: 0.9;">Paid</span>';
                                        } else if (data === 2) {
                                            return '<span class="label label-danger label-inline mr-2">Cancel</span>';
                                        }
                                    }
                                },
                                {
                                    data: 'total',
                                    render: function(data, type, row) {
                                        return '$' + parseFloat(data).toFixed(
                                            2); // Assuming data is numeric
                                    }
                                },
                                {
                                    data: 'created_at',
                                    render: function(data, type, row) {
                                        var date = new Date(data);
                                        var day = date.getDate().toString().padStart(2,
                                            '0');
                                        var month = (date.getMonth() + 1).toString()
                                            .padStart(2, '0');
                                        var year = date.getFullYear();

                                        return day + '-' + month + '-' + year;
                                    }
                                },
                                {
                                    data: null,
                                    render: function(data, type, row) {
                                        var editRoute =
                                            "<?php echo e(route('edit.client.orders', ':id')); ?>";
                                            editRoute = editRoute.replace(':id', data.id);

                                            var viewRoute =
                                            "<?php echo e(route('orders.client.show', ':id')); ?>";
                                            viewRoute = viewRoute.replace(':id', data.id);

                                        return '<a title="Edit Client" class="btn btn-sm btn-clean btn-icon" style="padding: 0px 30px;margin-left: 10px;background: #557D60;color: #ffff;opacity: 0.9;" href="' +
                                            editRoute + '">' +
                                            '<i class="icon-1x text-dark-50 flaticon-edit" style="color: #ffff !important; margin-right: 5px;"></i>Edit</a><a style="padding: 0px 30px;margin-left: 10px;background: #557D60;color: #ffff;opacity: 0.9;" title="View Oreder Detail" class="btn btn-sm btn-clean btn-icon" href="' +
                                            viewRoute + '">' +
                                            '<i class="icon-1x text-dark-50 flaticon-eye" style="color: #ffff !important; margin-right: 5px;"></i>View</a>';
                                    }
                                },
                            ]
                        });
                    },
                    error: function() {
                        toastr.error('something went wrong');
                    }

                });
            }

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/ryulgomy/public_html/wyoming/resources/views/client/orders/index.blade.php ENDPATH**/ ?>