@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Jobs</div>

                <div class="panel-body">

                    @foreach($jobs as $job)

                    <div class="article">

                        <h4><a href="{{ route('jobs.show', [$job, $job->id]) }}">{{ $job->title }}</a></h4>

                        <div class="body">
                            
                            {{ $job->description }}

                        </div>
                        
                    </div>

                    <hr>

                    @endforeach

                </div>
            </div>
            {{ $jobs->links() }}
        </div>
    </div>
</div>
@endsection
