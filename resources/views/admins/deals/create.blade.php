@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new deal!</div>

                <div class="panel-body">

                    <form action="{{ route('admin.deals.store') }}" method="POST">
                        
                        {{ csrf_field() }}

                        @if(count($errors))

                            <div class="form-group alert alert-danger">

                                @foreach($errors->all() as $error)

                                    <p>{{ $error }}</p>

                                @endforeach

                            </div>

                        @endif

                        <div class="form-group">
                            
                            <label for="deal_type_id">Deal Type - What kinda deal is this?</label>

                            <select name="deal_type_id" id="deal_type_id" class="form-control">

                                <option>Select a deal type</option>

                                @foreach(\App\DealType::all() as $dealType)

                                    <option value="{{ $dealType->id }}">{{ $dealType->name }}</option>

                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            
                            <label for="package_id">Package Type - Which package is this deal for?</label>

                            <select name="package_id" id="package_id" class="form-control">

                                <option>Select a deal type</option>

                                @foreach(\App\Package::all() as $package)

                                    <option value="{{ $package->id }}">{{ $package->name }}</option>

                                @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            
                            <label for="name">Name</label>

                            <input value="{{ old('name') }}" type="text" id="name" name="name" class="form-control">

                        </div>

                        <div class="form-group">
                            
                            <label for="description">Description</label>

                            <textarea class="form-control" name="description" id="description" rows="4">{{ old('description') }}</textarea>

                        </div>

                        <div class="form-group">
                            
                            <label for="min">Minimum number of ads</label>

                            <select name="min" id="min" class="form-control">
                                <option value="">Select minimum amount</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>

                        </div>

                        <div class="form-group">
                            
                            <label for="max">Maximum number of ads</label>

                            <select name="max" id="max" class="form-control">
                                <option value="">Select minimum amount</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>

                        </div>

                        <div class="form-group">
                            
                            <label for="price">Price</label>

                            <input type="text" value="{{ old('price') }}" id="price" name="price" class="form-control" placeholder="i left this unformatted on purpose">

                        </div>

                        <div class="form-group">
                            
                            <button class="btn btn-success pull-right">

                                Create Deal

                            </button>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
