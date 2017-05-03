@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                
                @include('flash::message')

                <div class="panel-body">
                    
                    <div class="row">
                    
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="glyphicon glyphicon-th-list"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <h4>View Job Packages</h4>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('packages.index') }}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        @if(auth()->user()->hasRole('employer'))
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="glyphicon glyphicon-th-list"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h4>Employer Profile</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('employer.profile.create') }}">
                                        <div class="panel-footer">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif                        

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="glyphicon glyphicon-th-list"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <h4>Special Deals</h4>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('employer.deals.index') }}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>                   

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
