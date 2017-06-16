@extends('layouts.user') 

@section('media_list_active') active @endsection 

@section('custom_styles')
    <link rel="stylesheet" href="{{ asset('/css/user/metro/metro.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">

        {{-- <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/categories/') }}">Metro</a></li>
            <li><a href="{{ url('/cities/') }}">{{ $metro_line->city->name }}</a></li>
            <li><a href="{{ url('/metro/'.$metro_line->city->id) }}">{{ $metro_line->city->name }}</a></li>
            <li class="active">{{ $metro_line->name }}</li>
        </ol> --}}
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Stations</h3>
            </div>
            <div class="panel-body">

                @if(!$stations->isEmpty())

                    <div class="page-header">
                        <h4>Stations on {{ $metro_line->name }}</h4>
                    </div>
                    <?php $i=1; ?>
                    <div class="row">
                    @foreach($stations as $station)

                        <div class="col-sm-3">
                            <div class="station_block">
                                <a href="{{ url('metro/station/'.$station->id) }}" class="btn btn-primary btn-block">{{ $station->name }}</a>
                            </div>
                        </div>

                        @if($i%4 == 0)
                            </div>
                            <div class="row">
                        @endif

                        <?php $i++; ?>
                    @endforeach
                    </div>
                @else
                    <div>
                        <p class="text-warning text-center">No Metro Line in this city yet.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection 

@section('custom_scripts')
    <script src="{{ asset('js/user/metro/metro.js') }}"></script>
@endsection