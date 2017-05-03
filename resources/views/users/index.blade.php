@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Users</div>

                <div class="panel-body">

                    @foreach($users as $user)

                    <div class="article">

                        <h4><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></h4>

                        <div class="body">
                            
                            {{ $user->email }}

                        </div>
                        
                    </div>

                    <hr>

                    @endforeach

                </div>
            </div>
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
