@extends('products.layout')

@section('content')

    <span class="titleProducts">Create new product</span>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your input code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="nameDesc">Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="nameDesc">Description:</strong>
                    <textarea class="form-control" style="height:280px" name="description" placeholder="Description"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="nameDesc">Select product image:</strong>
                    <input type="file" name="image">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-outline-info btn-lg" href="{{ route('products.index') }}"> Back</a>
                <button type="submit" class="btn btn-info btn-lg">Submit</button>
            </div>
        </div>
    </form>
@endsection
