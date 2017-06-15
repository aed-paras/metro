@extends('layouts.admin')

@section('panel_type_active')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            
            <div class="page-header">
                <h2>Panel Types</h2>
            </div>

            <form action="{{url('/admin/panel_type/')}}" method="POST" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col-sm-7">
                            <input type="text" name="name" id="panel_type" class="form-control" required="required" title="Panel type" placeholder="Enter Panel type">
                        </div>
                        <div class="col-sm-5 text-right">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Add Panel Type</button>
                        </div>
                    </div>
            </form>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel Type</h3>
                </div>
                <div class="panel-body">

                    @if(!$panel_type_list->isEmpty())
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($panel_type_list as $panel_type)
                                    <tr class="panel_type_row" id="panel_type_row_{{$panel_type->id}}">
                                        <td>{{ $panel_type->id }}</td>
                                        <td class="panel_type-name">{{ $panel_type->name }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-warning btn-sm panel_type-edit" data-id="{{$panel_type->id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm panel_type-delete" data-id="{{$panel_type->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        
                    @else
                        <div><p class="text-warning text-center">No Panel type created yet.</p></div>
                    @endif
                    {{ $panel_type_list->links() }}
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
                    <h4 class="modal-title">Edit Panel type Name</h4>
                </div>
                <form action="{{ url('/admin/panel_type') }}" method="POST" role="form" id="editModalForm">
                    <div class="modal-body">
                        <p>Changing <span class="modal-panel_type-name"></span></p>
                        <div class="form-group">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <label for="new-panel-type-name" class="label-control">Enter new panel type name</label>
                            <input type="text" name="name" class="form-control" id="new-panel_type-name" placeholder="New Panel type Name" required>
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
    <script src="{{ asset('js/admin/custom/panel_type.js') }}"></script>
@endsection
