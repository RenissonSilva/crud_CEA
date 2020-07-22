@extends('products.layout')
@section('content')
    <span class="titleProducts"> Show product</span>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <img src="{{URL::to('/')}}/images/{{$product->image}}" class="rounded mx-auto d-block imgShow"/>
            </div>
        </div>
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group nameDesc text-center">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group nameDesc text-center">
                <strong>Description:</strong>
                {{ $product->description }}
            </div>
        </div>
        <a class="btn btn-info btn-lg" href="{{ route('products.index') }}"> Back</a>
    </div>
@endsection
