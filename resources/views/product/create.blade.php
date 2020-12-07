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
					<h3 class="panel-title">New product</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('product.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Product name">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="price" id="price" class="form-control input-sm" placeholder="Price of the product">
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="expiration" id="expiration" class="form-control input-sm" placeholder="Expiration date">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="existence" id="existence" class="form-control input-sm" placeholder="Stock in inventory">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									
									<select name="categories_id" id="categories_id" class="form-group">
									@foreach ($categories as $category)
										<option value=" {{ $category->id}} ">{{ $category->name }}</option>
									@endforeach
									</select>

								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">

									<select name="providers_id" id="providers_id" class="form-group">
									@foreach ($providers as $provider)
										<option value=" {{ $provider->id}} ">{{ $provider->name }}</option>
									@endforeach
									</select>

									</div>
								</div>
							</div>
						
							<div class="row">
 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Save" class="btn btn-success btn-block">
									<a href="{{ route('product.index') }}" class="btn btn-info btn-block" >Back</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection