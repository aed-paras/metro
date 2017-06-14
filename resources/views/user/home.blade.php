@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Where you want to promote your product?</div>

                <div class="panel-body">
                    <div class="page-header">
                        <h3>Select City</h3>
                    </div>
                        
                    <div class="row select_city_block">
                        
                        @forelse($cities as $city)
                            <div class="col-md-3 city-block">{{$city->name}}</div>
                        @empty
                            <div class="col-md-6 col-md-offset-3 text-center">No City Data Found!</div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
