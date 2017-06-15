@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="page-header">
                <h4>Panels | <small>{{ $station->name }} Station </small> &nbsp;&nbsp;<a href="{{url('/admin/stations/'.$station->city->id)}}" class="btn btn-default btn-sm">Change</a></h4>
            </div>

            <div class="text-right"><a href="{{ url('/admin/panel/create/'.$station->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create new Panel</a></div>
            <br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel List</h3>
                </div>
                <div class="panel-body">
                    @if(!$panel_list->isEmpty())
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($panel_list as $panel)
                                    <tr class="panel_row" id="panel_row_{{$panel->id}}">
                                        <td>{{ $panel->id }}</td>
                                        <td>{{ $panel->name }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-warning btn-sm panel-edit" data-id="{{$panel->id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm panel-delete" data-id="{{$panel->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        
                    @else
                        <div><p class="text-warning text-center">No Panel Created Yet.</p></div>
                    @endif
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
                    <h4 class="modal-title">Edit Panel Name</h4>
                </div>
                <form action="{{ url('/admin/panel') }}" method="POST" role="form" id="editModalForm">
                    <div class="modal-body">
                        <p>Changing <strong><span class="modal-panel-name"></span></strong></p>
                        <div class="form-group">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <label for="new-station-name">New Panel Name</label>
                            <input type="text" name="name" class="form-control" id="new-panel-name" placeholder="New Panel Name" required>
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
    <script src="{{ asset('js/admin/custom/panel.js') }}"></script>
@endsection
