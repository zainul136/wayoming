<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Name</td>
			<td><?php echo e($user->name); ?></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><?php echo e($user->price); ?></td>
		</tr>

		<tr>
			<td>Description</td>
			<td><?php echo e($user->description); ?></td>
		</tr>

		<tr>
			<td>Created at</td>
			<td><?php echo e($user->created_at); ?></td>
		</tr>

		</tbody>
	</table>
</div>

<?php /**PATH /Users/wer/Documents/Synet/wayoming/resources/views/admin/service-items/detail.blade.php ENDPATH**/ ?>