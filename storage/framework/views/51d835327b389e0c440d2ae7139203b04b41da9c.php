
<!--begin::Main-->
<?php echo $__env->make('client.partials._header-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--[html-partial:include:{"file":"partials/_header-mobile.html"}]/-->
		<div class="d-flex flex-column flex-root">

			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<?php echo $__env->make('client.partials._aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<!--[html-partial:include:{"file":"partials/_aside.html"}]/-->

				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<?php echo $__env->make('client.partials._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<!--[html-partial:include:{"file":"partials/_header.html"}]/-->

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<?php echo $__env->make('client.partials._subheader.subheader-v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						<!--[html-partial:include:{"file":"partials/_subheader/subheader-v1.html"}]/-->
             <?php echo $__env->yieldContent('content'); ?>
						<!--Content area here-->
					</div>

					<!--end::Content-->
					<?php echo $__env->make('client.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<!--[html-partial:include:{"file":"partials/_footer.html"}]/-->
				</div>

				<!--end::Wrapper-->
			</div>

			<!--end::Page-->
		</div>

		<!--end::Main-->
<?php /**PATH /home2/ryulgomy/public_html/wyoming/resources/views/client/layouts/layout.blade.php ENDPATH**/ ?>