@extends('layouts.admin')

@section('station_active')
    active
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="page-header">
                <h4>Station <small>Current City: {{ $current_city->name }}</small> &nbsp;&nbsp;<a href="{{url('/admin/city')}}" class="btn btn-default btn-sm">Change</a></h4>
            </div>

            @if($metro_lines->isEmpty())
            
            <div class="alert alert-danger">
                There are no Metro Lines in this city. Create Metro Lines to put stations on it. &nbsp;
                <a href="{{ url('/admin/metro_line_list') }}" class="btn btn-info">Add Metro Lines</a>
            </div>

            @else
            
            <form action="{{ url('/admin/station/') }}" method="POST" class="form-horizontal" role="form">
                {{ csrf_field() }}
                <input type="hidden" name="city_id" value="{{ $current_city->id }}">
                <div class="row form-group">
                    <div class="col-sm-5">
                        <label for="station">Station Name</label>                    
                        <input type="text" name="name" id="station" class="form-control" required="required" title="Station Name" placeholder="Enter Station Name">
                    </div>
                    <div class="col-sm-5">
                        <label for="metro_line_id_select_box">Metro Line</label>
                        <select name="metro_line_id" id="metro_line_id_select_box" class="form-control" required>
                            @foreach($metro_lines as $metro_line)
                                <option value="{{$metro_line->id}}" id="option_{{$metro_line->id}}">{{$metro_line->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2 text-center">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Add Station</button>
                    </div>
                </div>
            </form>

            @endif

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Stations</h3>
                </div>
                <div class="panel-body">
                    @if(!$stations->isEmpty())
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Metro Line</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stations as $station)
                                    <tr class="station_row" id="station_row_{{$station->id}}">
                                        <td>{{ $station->id }}</td>
                                        <td><a href="{{ url('/admin/stations/'.$station->id) }}" class="station-name">{{ $station->name }}</a></td>
                                        <td class="station-metro_line" data-line_id="{{ $station->metro_line_id }}">{{ $station->metro_line->name }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-warning btn-sm station-edit" data-id="{{$station->id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm station-delete" data-id="{{$station->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        
                    @else
                        <div><p class="text-warning text-center">No Station Created Yet.</p></div>
                    @endif
                    {{ $stations->links() }}
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Station Name</h4>
                </div>
                <form action="{{ url('/admin/station') }}" method="POST" role="form" id="editModalForm">
                    <div class="modal-body">
                        <p>Changing <strong><span class="modal-station-name"></span></strong></p>
                        <div class="form-group">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <label for="new-station-name">New Station Name</label>
                            <input type="text" name="name" class="form-control" id="new-station-name" placeholder="New Station Name" required>
                        </div>
                        <div class="form-group">
                            <label for="city_id_select_box">Station City</label>
                            <select name="city_id" id="city_id_select_box" class="form-control">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}" id="city_option_{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="metro_line_id_select_box_update">Metro Line</label>
                            <select name="metro_line_id" id="metro_line_id_select_box_update" class="form-control">
                                @foreach($metro_lines as $metro_line)
                                    <option value="{{$metro_line->id}}" id="line_option_{{$metro_line->id}}">{{$metro_line->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection

@section('custom_scripts')
    <script>
        var current_city_id = {{$current_city->id}};
    </script>
    <script src="{{ asset('js/admin/custom/station.js') }}"></script>
@endsection
