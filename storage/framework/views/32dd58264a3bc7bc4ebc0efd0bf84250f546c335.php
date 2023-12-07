<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
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
                                <a href="" class="text-muted">CMS Setting</a>
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
                            <h3 class="card-label">Website CMS Form
                                <i class="mr-2"></i>
                                <small class="">try to scroll the page</small>
                            </h3>

                        </div>
                        <div class="card-toolbar">

                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-light-primary font-weight-bolder mr-2">
                                <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

                            <div class="btn-group">
                                <a href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault(); document.getElementById('setting_form').submit();"
                                    id="kt_btn" class="btn btn-primary font-weight-bolder">
                                    <i class="ki ki-check icon-sm"></i>Save</a>



                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!--begin::Form-->
                        <form class="form" id="setting_form" method="POST" action="<?php echo e(route('setting.store')); ?>"
                            enctype='multipart/form-data'>
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-8">
                                    <div class="my-5">
                                        <h3 class="text-dark font-weight-bold mb-10">Change Setting:</h3>
                                        <?php $__currentLoopData = $all_columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($column['type'] == 'text'): ?>
                                                <div class="form-group row">
                                                    <label class="col-3"><?php echo e($column['label']); ?></label>
                                                    <div class="col-9">
                                                        <input class="<?php echo e($column['class']); ?>" type="text"
                                                            name="<?php echo e($column['name']); ?>"
                                                            placeholder="<?php echo e($column['place_holder']); ?>"
                                                            value="<?php echo e(isset($settings[$column['name']]) ? $settings[$column['name']] : ''); ?>">
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if($column['type'] == 'hidden'): ?>
                                                <input type="hidden" name="<?php echo e($column['name']); ?>"
                                                    value="<?php echo e(isset($settings[$column['name']]) ? $settings[$column['name']] : ''); ?>">
                                            <?php endif; ?>

                                            <?php if($column['type'] == 'file'): ?>
                                                <div class="form-group row">
                                                    <label class="col-3"><?php echo e($column['label']); ?></label>
                                                    <?php
                                                    if (isset($settings[$column['name']])) {
                                                        $settings[$column['name']] = $settings[$column['name']];
                                                    } else {
                                                        $settings[$column['name']] = 'abc.png';
                                                    }
                                                    ?>
                                                    <div class="col-9">
                                                        <div class="custom-file">
                                                            <input type="file" name="<?php echo e($column['name']); ?>"
                                                                class="<?php echo e($column['class']); ?>" id="<?php echo e($column['id']); ?>">
                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file</label>
                                                            <?php if(File::exists('uploads/' . $settings[$column['name']])): ?>
                                                                <img src="<?php echo e(asset('uploads/' . $settings[$column['name']])); ?>"
                                                                    style="<?php echo e($column['style']); ?>"
                                                                    alt="<?php echo e($column['name']); ?> is not found" />
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('uploads/img.png')); ?>"
                                                                    style="<?php echo e($column['style']); ?>"
                                                                    alt="<?php echo e($column['name']); ?> is not found" />
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($column['type'] == 'textarea'): ?>
                                                <div class="form-group row">
                                                    <label class="col-3"><?php echo e($column['label']); ?></label>
                                                    <div class="col-9">
                                                        <textarea name="<?php echo e($column['name']); ?>" class="<?php echo e($column['class']); ?>"
                                                            rows="<?php echo e(isset($column['rows']) ? $column['rows'] : '2'); ?>" placeholder="<?php echo e($column['place_holder']); ?>"
                                                            id="<?php echo e($column['id']); ?>"><?php echo e(isset($settings[$column['name']]) ? $settings[$column['name']] : ''); ?>

														</textarea>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if($column['type'] == 'checkbox'): ?>
                                                <div class="form-group row">
                                                    <label class="col-3 col-form-label"><?php echo e($column['label']); ?></label>
                                                    <div class="col-9">
                                                        <span class="switch switch-outline switch-icon switch-success">
                                                            <input name="<?php echo e($column['name']); ?>"
                                                                class="<?php echo e($column['class']); ?>" type="checkbox"
                                                                id="<?php echo e($column['id']); ?>"
                                                                value="<?php echo e($column['value']); ?>"><span></span>
                                                            </label>
                                                        </span>

                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="separator separator-dashed my-10"></div>

                                </div>
                                <div class="col-xl-2"></div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Card-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/wer/Documents/Synet/wayoming/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>