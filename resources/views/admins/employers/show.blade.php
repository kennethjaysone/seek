@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $employer->name }}</div>

                <div class="panel-body">

                    {{ $employer->description }}

                    @foreach(\App\Deal::all() as $deal)
                        
                        <form method="POST" action="{{ route('admin.employers.deal.update') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="deal_id" value="{{ $deal->id }}">
                            <input type="hidden" name="employer_id" value="{{ $employer->id }}">
                            <h4>{{ $deal->name }}</h4>
                            <button type="submit">Attach Deal</button>
                        </form>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
