<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Name</td>
			<td>{{$user->name}}</td>
		</tr>

		<tr>
			<td>Food Allergy</td>
			<td>{{$user->food_allergy}}</td>
		</tr>

		<tr>
			<td>Division number</td>
			<td>{{$user->division_number}}</td>
		</tr>

		<tr>
			<td>School</td>
			<td>{{$user->school->name}}</td>
		</tr>


		<tr>
			<td>Created at</td>
			<td>{{$user->created_at}}</td>
		</tr>

		</tbody>
	</table>
</div>

