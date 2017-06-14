@extends('layouts.admin')

@section('station_active')
    active
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            
            <div class="page-header">
                <h4>Add City</h4>
            </div>

            <form action="{{url('/admin/city/')}}" method="POST" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col-sm-10">
                            <input type="text" name="name" id="city" class="form-control" required="required" title="City" placeholder="Enter City">
                        </div>
                        <div class="col-sm-2 text-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add City</button>
                        </div>
                    </div>        

            </form>


            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Cities</h3>
                </div>
                <div class="panel-body">

                    @if(!$cities->isEmpty())
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $city)
                                    <tr class="city_row" id="city_row_{{$city->id}}">
                                        <td>{{ $city->id }}</td>
                                        <td><a href="{{ url('/admin/stations/'.$city->id) }}" class="city-name">{{ $city->name }}</a></td>
                                        <td>{{ $city->created_at }}</td>
                                        <td class="text-right">
                                            <a class="btn btn-warning btn-sm city-edit" data-id="{{$city->id}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm city-delete" data-id="{{$city->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        
                    @else
                        <div><p class="text-warning text-center">No City Created Yet.</p></div>
                    @endif
                    {{ $cities->links() }}
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
                    <h4 class="modal-title">Edit City Name</h4>
                </div>
                <form action="{{ url('/admin/city') }}" method="POST" role="form">
                    <div class="modal-body">
                        <p>Changing <span class="modal-city-name"></span></p>
                        <div class="form-group">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id" id="modal-city-id" required>
                            <label for="new-city-name" class="label-control">Enter new city name</label>
                            <input type="text" name="name" class="form-control" id="new-city-name" placeholder="New City Name" required>
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
    <script src="{{ asset('js/admin/custom/city.js') }}"></script>
@endsection
