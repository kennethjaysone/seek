@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }}</div>

                <div class="panel-body">                    

                    <div class="article">

                        <h4>{{ $user->name }}</h4>

                        <div class="body">
                            
                            <p>{{ $user->email }}</p>

                            <div class="pull-right">

                                @if($user->hasRole('guest'))

                                <form action="{{ route('admin.update.role', $user->id) }}" method="POST">
                                    
                                    {{ csrf_field() }}

                                    {{ method_field('PUT') }}

                                    <button class="btn btn-success">Change to Employer</button>

                                </form>
                                @else

                                    @if($user->hasRole('employer'))
                                        <span class="label label-success">Employer</span>
                                    @endif
                                    
                                @endif

                            </div>

                        </div>
                        
                    </div>

                </div>

            </div>
            
        </div>
    </div>
</div>
@endsection
