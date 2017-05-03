@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Job Packages</div>

                <div class="panel-body">

                    @foreach($packages as $package)

                    <div class="article row">

                        <div class="body">

                            <div class="col-md-8">

                            <h4><a href="#">{{ $package->name }}</a></h4>
                                
                                {{ $package->description }}

                            </div>

                            <div class="col-md-4">
                                
                                <div class="panel panel-default">
                                    <div class="panel-body text-center">
                                    RM {{ $package->formatted_price }}
                                    </div>
                                </div>

                                <a href="{{ route('packages.show', $package->id) }}" class="btn btn-success btn-block">Get It!</a>

                            </div>
                                
                        </div>
                        
                    </div>

                    <hr>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
