<?php $__env->startSection('title',$title); ?>
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
                <a href="" class="text-muted">Manage Services</a>
              </li>
              <li class="breadcrumb-item text-muted">
                <a href="" class="text-muted">Add Service</a>
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
              <h3 class="card-label">Service Add Form
                <i class="mr-2"></i>
                <small class="">try to scroll the page</small></h3>

            </div>
            <div class="card-toolbar">

              <a href="<?php echo e(route('service-items.index')); ?>" class="btn btn-light-primary
              font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>

              <div class="btn-group">
                <a href="<?php echo e(route('service-items.store')); ?>"  onclick="event.preventDefault(); document.getElementById('client_add_form').submit();" id="kt_btn" class="btn btn-primary font-weight-bolder">
                  <i class="ki ki-check icon-sm"></i>Save</a>



              </div>
            </div>
          </div>
          <div class="card-body">
          <?php echo $__env->make('admin.partials._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <!--begin::Form-->
            <?php echo e(Form::open([ 'route' => 'service-items.store','class'=>'form' ,"id"=>"client_add_form", 'enctype'=>'multipart/form-data'])); ?>

              <?php echo csrf_field(); ?>
              <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                  <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">Service Info: </h3>
                    <div class="form-group row <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                      <label class="col-3">Name</label>
                      <div class="col-9">
                        <?php echo e(Form::text('name', null, ['class' => 'form-control form-control-solid','id'=>'name','placeholder'=>'Enter Name','required'=>'true'])); ?>

                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                      </div>
                    </div>
                    <div class="form-group row <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                      <label class="col-3">Price</label>
                      <div class="col-9">
                        <?php echo e(Form::number('price', null, ['class' => 'form-control form-control-solid','id'=>'email','placeholder'=>'Enter Price','required'=>'true'])); ?>

                        <span class="text-danger"><?php echo e($errors->first('price')); ?></span>
                      </div>
                    </div>

                    <div class="form-group row <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
                      <label class="col-3">Description</label>
                      <div class="col-9">
                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control form-control-solid','id'=>'description','placeholder'=>'Enter Description','required'=>'true'])); ?>

                        <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                      </div>
                    </div>


                  </div>

                </div>
                <div class="col-xl-2"></div>
              </div>
          <?php echo e(Form::close()); ?>

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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/ryulgomy/public_html/wyoming/resources/views/admin/service-items/create.blade.php ENDPATH**/ ?>