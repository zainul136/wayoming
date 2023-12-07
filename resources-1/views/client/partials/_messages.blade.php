@if(Session::has('success_message'))
	<div class="alert alert-success" style="margin-bottom: 10px;">
		<p style="font-size: 14px">{{ Session::get('success_message') }}</p>
	</div>
@endif
@if(Session::has('error_message'))
	<div class="alert alert-danger" style="margin-bottom: 10px;">
		<p style="font-size: 14px">{{ Session::get('error_message') }}</p>
	</div>
@endif
