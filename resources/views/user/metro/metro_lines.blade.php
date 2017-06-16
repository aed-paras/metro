@extends('layouts.user') 

@section('media_list_active') active @endsection 

@section('custom_styles')

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
                    <?php $i=1; ?>
                    <div class="row">
                    @foreach($metro_lines as $metro_line)

                        <div class="col-md-3">
                            
                            <div class="metro_line_block">
                                <div class="image">
                                    <img src="{{  }}" alt="{{ $metro_line->name }}">
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
    <script src="{{ asset('js/user/custom/metro_line.js') }}"></script>
@endsection