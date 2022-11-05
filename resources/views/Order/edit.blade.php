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


                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <a href="{{route('order.home')}}" class="btn btn-secondary">Back</a>

                    <div class="container mt-3">
                        <form method="post" action="{{route('order.update',$order->id)}}" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-hover">
                                <tbody>

                                    <tr>
                                        <th>Customer Name
                                        </th>
                                        <td>
                                            <select name="customerid" id="" required>
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->id}}" {{$customer->id == $order->customerid ? "selected":''}}>{{$customer->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Product Name
                                        </th>
                                        <td>
                                            <select name="productid" id="" required>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}" {{$product->id == $order->productid ? "selected":''}}>{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                    </tr>

                                    <tr>
                                        <th>Quantity
                                        </th>
                                        <td>
                                            <input type="number" name="quantity" min="0" id="">
                                        </td>

                                    </tr>




                                </tbody>

                            </table>
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
