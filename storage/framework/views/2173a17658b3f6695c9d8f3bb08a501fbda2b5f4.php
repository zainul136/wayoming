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
                                <a href="" class="text-muted">Document</a>
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
                    <h3 class="card-label">Documents List</h3>
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
                        <table class="table table-bordered table-hover table-checkable" style="margin-top: 13px !important">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th class="text-center">Order Number</th>
                                    <th>Created At</th>
                                    <th>Document</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if(isset($documents)): ?>
                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($doc->order->user->name); ?></td>
                                            <td class="text-center"><?php echo e($doc->order->id); ?></td>
                                            <td><?php echo e($doc->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(asset($doc->document)); ?>" target="_blank"><?php echo e($doc->document); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </form>
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
        $(document).on('click', 'th input:checkbox', function() {

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/wer/Documents/Synet/wayoming/resources/views/admin/document/index.blade.php ENDPATH**/ ?>