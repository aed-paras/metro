@extends('layouts.admin')

@section('metro_line_list_active')
	active
@endsection

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header">
						<h4>Add Metro Line</h4>
					</div>
					<form action="{{ url('/admin/metro_line/') }}" method="POST" class="form-horizontal create-metro-line-form" role="form" enctype="multipart/form-data">
						{{ csrf_field() }}
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<div class="row form-group">
							<div class="col-sm-12">
								<input type="text" name="name" id="metro_line" class="form-control" required="required" title="Metro Line Name" placeholder="Enter Metro Line Name">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-12">
								<select name="city_id" id="city_id_select_box" class="form-control">
									@foreach($cities as $city)
										<option value="{{$city->id}}" id="option_{{$city->id}}">{{$city->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-12">
								<label>Select an image for metro sign: <input type="file" name="image_file" accept="image/*" data-max-size="2048" class="upload-file" required></label>
								Max File Size: 2 MB
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-12 text-right">
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
@endsection

@section('custom_scripts')
	<script src="{{ asset('js/admin/custom/metro_line.js') }}"></script>
@endsection
