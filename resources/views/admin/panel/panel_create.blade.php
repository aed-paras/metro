@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="page-header">
                <h4>Add Panel | <small>{{ $station->name }} Station </small> &nbsp;&nbsp;<a href="{{url('/admin/stations/'.$station->city->id)}}" class="btn btn-default btn-sm">Change</a></h4>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Add new Panel</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ url('/admin/panel/') }}" method="POST" enctype="multipart/form-data">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <input type="hidden" name="station_id" value="{{ $station->id }}">

                        <div class="form-group">
                            <label for="inputMedia" class="col-lg-3 control-label">Media/Location</label>
                            <div class="col-lg-9">
                                <select class="form-control" id="inputMedia" name="media_id" required>
                                    @foreach($media_list as $media)
                                        <option value="{{ $media->id }}">{{ $media->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPanelType" class="col-lg-3 control-label">Panel Type</label>
                            <div class="col-lg-9">
                                <select class="form-control" id="inputPanelType" name="panel_type_id" required>
                                    @foreach($panel_type_list as $panel_type)
                                        <option value="{{ $panel_type->id }}">{{ $panel_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputWidth" class="col-lg-3 control-label">Size</label>
                            <div class="col-lg-4">
                                <input type="number" class="form-control" id="inputWidth" placeholder="Width (Ft.)" name="width" step="any" required>
                            </div>
                            <div class="col-lg-4">
                                <input type="number" class="form-control" id="inputHeight" placeholder="Heigth (Ft.)" name="height" step="any" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputUnits" class="col-lg-3 control-label">Units</label>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" id="inputUnits" placeholder="Units" name="units" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAvailable" class="col-lg-3 control-label">Available Units</label>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" id="inputAvailable" placeholder="Available Units" name="available" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-lg-3 control-label">Description</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" rows="4" id="description" maxlength="4000" name="description" placeholder="Enter description here..." required></textarea>
                                <span class="help-block">Provide some description of the panel. Max 4000 Characters</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="charges" class="col-lg-3 control-label">Charges per month</label>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" name="charges" placeholder="Charges (without discount)" step="any">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="charges" class="col-lg-3 control-label">Actual Charges per month</label>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" name="actual_charges" placeholder="Charges (with discount)" step="any">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image" class="col-lg-3 control-label">Panel Image</label>
                            <div class="col-lg-9">
								<input type="file" name="image_file" accept="image/*" data-max-size="2048" class="upload-file" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Panel</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('custom_scripts')
    <script src="{{ asset('js/admin/custom/panel.js') }}"></script>
@endsection
