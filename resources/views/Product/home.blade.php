@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if($message=Session::get('success'))
                    <div class=" alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <div class="container mt-3">

                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Expiry Date</th>
                                    <th>Code</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <a href="{{route('product.create')}}" class="btn btn-primary">Create</a>
                                </tr>
                                @foreach($products as $product)
                                <tr class="text-center">
                                    <td>{{++$i}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->expirydate}}</td>
                                    <td>{{$product->code}}</td>
                                    <td>
                                        <a href="{{route('product.view',$product->id)}}" class="btn btn-primary">View</a>
                                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-success">Edit</a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
