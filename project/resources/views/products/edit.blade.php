@extends('products.layout')

@section('content')
    <span class="titleProducts">Edit product</span>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="nameDesc">Name:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" style="margin-top:15px;" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="nameDesc">Description:</strong>
                    <textarea class="form-control" style="height:150px;margin-top:15px;" name="description" placeholder="Description">{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="nameDesc">Image:</strong>
                    <input type="file" name="image" />
                    <input type="hidden" name="hidden_image" value="{{$product->image}}"/>
                </div>
                <img src="{{URL::to('/')}}/images/{{$product->image}}" width="150"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-outline-info btn-lg" href="{{ route('products.index') }}"> Back</a>
              <button type="submit" class="btn btn-info btn-lg">Submit</button>
            </div>
        </div>

    </form>
@endsection
