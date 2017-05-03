@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $package->name }}</div>

                <div class="panel-body">

                    <div class="article">

                        <div class="body">
                            
                            {{ $package->description }}

                            {{ $package->formatted_price}}

                            <hr>

                            <h4>Make a payment</h4>

                            <p>This is where we will include a form for a user to key in credit card details and submit the payment</p>

                            <p class="alert alert-info">We're going to assume the payment is successful when we attempt to pay</p>

                            <form method="post" action="{{ route('payments.store', $package) }}">

                                {{ csrf_field() }}

                                <input type="hidden" name="package_id" value="{{ $package->id }}">
                                <input type="hidden" name="amount" value="{{ $package->price }}">
                                
                                <button class="btn btn-success btn-lg">Submit Payment</button>

                            </form>

                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
