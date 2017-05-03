@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Employer Profile</div>

                <div class="panel-body">

                    <form action="{{ route('employer.profile.store') }}" method="POST">
                        
                        {{ csrf_field() }}

                        @if(count($errors))
                            <div class="form-group alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group">
                            
                            <label for="name">Name</label>

                            <input type="text" id="name" name="name" class="form-control">

                        </div>

                        <div class="form-group">
                            
                            <label for="description">Description</label>

                            <textarea class="form-control" name="description" id="description" rows="4"></textarea>

                        </div>

                        <div class="form-group">
                            
                            <button class="btn btn-success pull-right">

                                Create

                            </button>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
