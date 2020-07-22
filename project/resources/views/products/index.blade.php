@extends('products.layout')

@section('content')
    @auth
    <form action="{{route('logout')}}" method="post">
    @csrf
    <button class="btn btn-secundary">{{auth()->user()->name}} - Logout</button>
    </form>
    @else
        <a class="btn btn-secundary" href="{{ route('login') }}"> Login</a>
    @endauth
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create new products</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td><img src="{{URL::to('/')}}/images/{{$product->image}}" width="75"/> </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @if (Auth::check())
    <table class="table table-bordered">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td><img src="{{URL::to('/')}}/images/{{$product->image}}" width="75"/> </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
    {!! $products->links() !!}

@endsection
