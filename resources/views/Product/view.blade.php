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


                    <a href="{{route('product.home')}}" class="btn btn-secondary">Back</a>

                    <div class="container mt-3">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name
                                    </th>
                                    <td>
                                        {{$product->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Price
                                    </th>
                                    <td>
                                        {{$product->price}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Code
                                    </th>
                                    <td>
                                        {{$product->code}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Expiry Date
                                    </th>
                                    <td>
                                        {{$product->expirydate}}
                                    </td>
                                </tr>


                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
