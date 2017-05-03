@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Awesome Deals</div>

                <div class="panel-body">

                    @foreach($employer[0]->deals as $deal)

                    <div class="article row">

                        <div class="body">

                            <div class="col-md-8">

                            <h4><a href="#">{{ $deal->name }}</a></h4>
                                
                                {{ $deal->description }}

                            </div>

                            <div class="col-md-4">
                                
                                <div class="panel panel-default">
                                    <div class="panel-body text-center">
                                    RM {{ $deal->formatted_price }}
                                    </div>
                                </div>

                                <a href="#" class="btn btn-success btn-block">Get It!</a>

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
