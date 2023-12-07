<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="<?php echo e(asset('assets/plugins/global/plugins.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/custom/prismjs/prismjs.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scripts.bundle.js')); ?>"></script>

<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
<script src="<?php echo e(asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')); ?>"></script>

<!--end::Page Vendors-->

<!--begin::Page Scripts(used by this page)-->
<script src="<?php echo e(asset('assets/js/pages/widgets.js')); ?>"></script>
<script>
    var btn = KTUtil.getById("kt_btn");

    KTUtil.addEvent(btn, "click", function() {
        KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Please wait");

        setTimeout(function() {
            KTUtil.btnRelease(btn);
        }, 1000);
    });
</script>
<?php echo $__env->yieldContent('scripts'); ?>


<!--end::Page Scripts--><?php /**PATH /Users/wer/Documents/Synet/wayoming/resources/views/client/partials/_scripts.blade.php ENDPATH**/ ?>