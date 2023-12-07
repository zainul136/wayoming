<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon-users text-primary"></i>
                </span>
                <h3 class="card-label">Client Detail</h3>
            </div>
            <div class="card-toolbar">

                <!--begin::Button-->
                
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="table-responsive">
                <form action="<?php echo e(route('admin.delete-selected-clients')); ?>" method="post" id="client_form">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="clients"
                        style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <?php if($user->active == 1): ?>
                                        <span class="label label-success label-inline mr-2">Active</span>
                                    <?php else: ?>
                                        <span class="label label-danger label-inline mr-2">InActive</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($user->created_at); ?></td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-clean btn-icon btn-sm" data-toggle="dropdown">
                                            <i class="flaticon-more-1"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- Menu items go here -->
                                            <a class="dropdown-item" href="mailto:<?php echo e($user->email); ?>">Send Email</a>
                                            <a class="dropdown-item" href="<?php echo e(route('clients.edit', $user->id)); ?>">Edit
                                                Detail</a>
                                            <!-- Add more menu items as needed -->
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <!--end: Datatable-->
            </div>
        </div>

    </div>
    <!--end::Card-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/wer/Documents/Synet/wayoming/resources/views/admin/clients/detail.blade.php ENDPATH**/ ?>