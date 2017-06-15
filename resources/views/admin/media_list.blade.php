@extends('layouts.admin')

@section('media_list_active')
    active
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            
            <form action="{{url('/admin/media/')}}" method="POST" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col-sm-10">
                            <input type="text" name="name" id="media" class="form-control" required="required" title="Media" placeholder="Enter Media" autofocus="on">
                        </div>
                        <div class="col-sm-2 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Media</button>
                        </div>
                    </div>
            </form>


            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Media/Locations</h3>
                </div>
                <div class="panel-body">

                    @if(!$media_list->isEmpty())
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($media_list as $media)
                                    <tr class="media_row" id="media_row_{{$media->id}}">
                                        <td>{{ $media->id }}</td>
                                        <td><a href="{{ url('/admin/stations/'.$media->id) }}" class="media-name">{{ $media->name }}</a></td>
                                        <td class="text-right">
                                            <a class="btn btn-warning btn-sm media-edit" data-id="{{$media->id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm media-delete" data-id="{{$media->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        
                    @else
                        <div><p class="text-warning text-center">No Media Created Yet.</p></div>
                    @endif
                    {{ $media_list->links() }}
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
                    <h4 class="modal-title">Edit Media Name</h4>
                </div>
                <form action="{{ url('/admin/media') }}" method="POST" role="form" id="editModalForm">
                    <div class="modal-body">
                        <p>Changing <strong><span class="modal-media-name"></span></strong></p>
                        <div class="form-group">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <label for="new-media-name" class="label-control">Enter new media name</label>
                            <input type="text" name="name" class="form-control" id="new-media-name" placeholder="New City Name" required>
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
    <script src="{{ asset('js/admin/custom/media.js') }}"></script>
@endsection
