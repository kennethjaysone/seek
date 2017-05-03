@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Employer Profile</div>

                <div class="panel-body">

                    <div class="article">
                        
                        <h4>{{ $employer->name }}</h4>
                        <p>{{ $employer->description }}</p>

                    </div>

                    <form action="{{ route('employer.profile.update', $employer) }}" method="POST">
                        
                        {{ csrf_field() }}

                        {{ method_field('PUT') }}

                        @if(count($errors))
                            <div class="form-group alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group">
                            
                            <label for="name">Name</label>

                            <input value="{{ $employer->name }}" type="text" id="name" name="name" class="form-control">

                        </div>

                        <div class="form-group">
                            
                            <label for="description">Description</label>

                            <textarea class="form-control" name="description" id="description" rows="4">{{ $employer->description }}</textarea>

                        </div>

                        <div class="form-group">
                            
                            <button class="btn btn-success pull-right">

                                Update

                            </button>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
