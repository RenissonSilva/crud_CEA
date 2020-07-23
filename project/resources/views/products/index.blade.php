@extends('products.layout')

@section('content')

    <span class="titleProducts">Check all products</span>
    <div>
        <a class="btn btn-info btn-create" href="{{ route('products.create') }}"> Create new product</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">All products</a>
            @if (Auth::check())
                <a class="nav-item nav-link" id="nav-myProducts-tab" data-toggle="tab" href="#nav-myProducts" role="tab" aria-controls="nav-myProducts" aria-selected="false">My products</a>
            @endif
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
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
    </div>
    <div class="tab-pane fade" id="nav-myProducts" role="tabpanel" aria-labelledby="nav-myProducts-tab">
        @if (Auth::check())
        <table class="table table-bordered">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th width="250px">Action</th>
            </tr>
            @foreach ($products as $product)
            @if(auth()->user()->id == $product->user_id)
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
                @endif
            @endforeach
        </table>
        @endif</div>
    </div>

@endsection
