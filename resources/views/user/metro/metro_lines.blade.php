@extends('layouts.user') 

@section('media_list_active') active @endsection 

@section('custom_styles')
    <link rel="stylesheet" href="{{ asset('/css/user/metro/metro.css') }}">
@endsection


@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Metro Lines</h3>
            </div>
            <div class="panel-body">

                @if(!$metro_lines->isEmpty())

                    <div class="page-header">
                        <h4>Select Metro Line</h4>
                    </div>
                    <span class="pull-right"><a href="{{ url('/stations/'.$city->id) }}" class="btn btn-default">Show All Stations Instead</a></span>
                    <div class="clearfix"></div>
                    <?php $i=1; ?>
                    <div class="row">
                    @foreach($metro_lines as $metro_line)

                        <div class="col-sm-3">
                            
                            <div class="metro_line_block" data-id="{{ $metro_line->id }}">
                                <div class="metro_line_image">
                                    <img src="{{ asset('storage/metro/'.$metro_line->image) }}" alt="{{ $metro_line->name }}" width="80%" height="80%">
                                </div>
                                <div class="metro_line_detail_block">
                                    <div class="metro_line_name">
                                        {{ $metro_line->name }}
                                    </div>
                                </div>
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