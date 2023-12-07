<?php if(Session::has('success_message')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php echo e(Session::get('success_message')); ?>

	</div>
<?php endif; ?>
<?php if(Session::has('error_message')): ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php echo e(Session::get('error_message')); ?>

	</div>
<?php endif; ?>
<?php /**PATH E:\xampp3\htdocs\wyoming_services\resources\views/admin/partials/_messages.blade.php ENDPATH**/ ?>