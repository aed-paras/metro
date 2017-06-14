@extends('layouts.admin')

@section('metro_line_list_active')
    active
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Metro Line</h3>
                </div>
                <div class="panel-body">
                    <div class="text-right"><a href="{{ url('/admin/metro_line/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Metro Line</a></div>
                    <hr>
                    @if(!$metro_line_list->isEmpty())
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Image</th>
                                    <th>Created at</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($metro_line_list as $metro_line)
                                    <tr class="metro_line_row" id="metro_line_row_{{$metro_line->id}}">
                                        <td>{{ $metro_line->id }}</td>
                                        <td><a href="{{ url('/admin/station/metro_line/'.$metro_line->id) }}" class="metro_line-name">{{ $metro_line->name }}</a></td>
                                        <td class="metro_line-city" data-city_id="{{ $metro_line->city_id }}">{{ $metro_line->city->name }}</td>
                                        <td><img src="{{ asset('storage/metro/'.$metro_line->image) }}" width="30px" height="30px"></td>
                                        <td>{{ $metro_line->created_at }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-warning btn-sm metro_line-edit" data-id="{{$metro_line->id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm metro_line-delete" data-id="{{$metro_line->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div><p class="text-warning text-center">No Metro Line Created Yet.</p></div>
                    @endif
                    {{ $metro_line_list->links() }}
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
                    <h4 class="modal-title">Edit Merto Line</h4>
                </div>
                <form action="{{ url('/admin/metro_line') }}" method="POST" role="form" id="editModalForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <p>Changing <strong><span class="modal-metro_line-name"></span></strong></p>
                        <div class="form-group">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            {{-- <input type="hidden" name="id" id="modal-metro_line-id" required> --}}
                            <label for="new-metro_line-name">New Metro Line Name</label>
                            <input type="text" name="name" class="form-control" id="new-metro_line-name" placeholder="New Station Name" required>
                        </div>
                        <div class="form-group">
                            <label for="new-metro_line-city">New Metro Line City</label>
                            <select name="city_id" id="city_id_select_box" class="form-control">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}" id="option_{{$city->id}}">{{$city->name}}</option>
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
    <script src="{{ asset('js/admin/custom/metro_line.js') }}"></script>
@endsection
