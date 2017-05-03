@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Employers on Seek's Platform</div>

                <div class="panel-body">

                    @foreach($employers as $employer)

                        <h4><a href="#">{{ $employer->name }}</a></h4>

                        <div class="body">
                            
                            {{ $employer->description }}

                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
