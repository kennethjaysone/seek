@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Deals for VIP Employers</div>

                <div class="panel-body">

                    <div class="table-responsive">

                        @if(count($deals))

                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Last Updated</th>
                                        <th>Additional Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($deals as $deal)
                                    <tr>
                                        <td>{{ $deal->name }}</td>
                                        <td>
                                            <h5>{{ $deal->type->name }}</h5>
                                            <h6>{{ $deal->name }}</h6> 
                                            <p>{{ $deal->description }}</p>
                                        </td>
                                        <td>RM {{ $deal->formatted_price }}</td>
                                        <td>{{ $deal->updated_at->diffForHumans() }}</td>
                                        <td><a href="">More details</a></td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @else

                            <h4>Oooops, Looks like we don't have any deals</h4>

                            <p>Go and <a href="{{ route('admin.deals.create') }}">create some</a>, it's good for business</p>

                        @endif
                        
                    </div>

                </div>

            </div>
            
        </div>
    </div>
</div>
@endsection
