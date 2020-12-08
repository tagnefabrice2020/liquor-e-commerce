@if(Session::has('success'))
	<div class="alert alert-success" role="alert" style="font-family: 'GT America'; text-transform: uppercase; font-size: small;">
  		<p style="padding: 5px 5px 0px 5px;">{{Session::get('success')}}</p>
	</div>
@elseif(Session::has('error'))
	<div class="alert alert-danger" role="alert" style="font-family: 'GT America'; text-transform: uppercase; font-size: small;">
  		<p style="padding: 5px 5px 0px 5px;">{{Session::get('error')}}</p>
	</div>
@elseif(Session::has('primary'))
	<div class="alert alert-primary" role="alert" style="font-family: 'GT America'; text-transform: uppercase; font-size: small;">
  		<p style="padding: 5px 5px 0px 5px;">{{Session::get('primary')}}</p>
	</div>
@endif