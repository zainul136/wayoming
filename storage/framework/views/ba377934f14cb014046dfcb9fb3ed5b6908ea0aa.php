<?php if(Session::has('success_message')): ?>
	<div class="alert alert-success">
		<?php echo e(Session::get('success_message')); ?>

	</div>
<?php endif; ?>
<?php if(Session::has('error_message')): ?>
	<div class="alert alert-danger">
		<?php echo e(Session::get('error_message')); ?>

	</div>
<?php endif; ?>
<?php /**PATH E:\xampp3\htdocs\wyoming_services\resources\views/client/partials/_messages.blade.php ENDPATH**/ ?>