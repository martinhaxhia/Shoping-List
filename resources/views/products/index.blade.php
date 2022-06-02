@extends('frontend')

@section('content')

    <div class="container px-6 mx-auto">
        <div class="row">
            @foreach ($products as $product)
                @csrf
                @guest
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                                <strong class="mt-2">${{ $product->price }}</strong>
                                @else
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                                                <h5>{{ $product->description }}</h5>
                                                <strong class="mt-2">${{ $product->price }}</strong>

                                               {{-- <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                                    <button class="rounded btn btn-success">Add To Cart</button>
                                                </form>--}}
                                                <a class="btn btn-success" href="{{ route('add.to.cart', $product->id) }}">Add To Card</a>
                                                <a class="btn btn-warning" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete Product">
                                                    Delete
                                                </a>
                                                <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Are you sure you want to delete {{ $product->name }} ?</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('products.destroy', $product->id) }}" method="post">

                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger">Yes, Delete Product</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endguest
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>

@endsection
