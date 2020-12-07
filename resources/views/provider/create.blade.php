@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif
 
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">New provider</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('provider.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Provider name">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="telephone" id="telephone" class="form-control input-sm" placeholder="Telephone">
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
								<input type="text" name="address" id="address" class="form-control input-sm" placeholder="Address">

								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="web_site" id="web_site" class="form-control input-sm" placeholder="Web_site">
									</div>
								</div>
							</div>
							
						
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Save" class="btn btn-success btn-block">
									<a href="{{ route('provider.index') }}" class="btn btn-info btn-block" >Back</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
		
	</section>
	
	@endsection
	