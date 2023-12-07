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
                <a href="" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#clientModel">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>Add Document</a>
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
        <!-- Modal-->
        <div class="modal fade" id="clientModel" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Add Document</h4>
                    </div>
                    <div class="modal-body">

                        <form action="<?php echo e(route('admin.store.document')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <?php $__currentLoopData = $user->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="order_id[]" value="<?php echo e($order->id); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/ryulgomy/public_html/wyoming/resources/views/admin/clients/detail.blade.php ENDPATH**/ ?>