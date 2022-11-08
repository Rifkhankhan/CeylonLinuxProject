@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
                        <form method="POST" action="{{route('order.store')}}" enctype="multipart/form-data" id="form">
                            @csrf
                            <table class="table table-hover">
                                <tbody>

                                    <tr>
                                        <th>Customer Name
                                        </th>
                                        <td>
                                            <select name="customerid" id="" required>
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <table class="table table-hover table-bordered"  id="example" >
                            <thead>
                                <tr >
                                    <th></th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Price</th>
                                    <th>Quantity Free</th>
                                    <th>Amount</th>


                                </tr>
                            </thead>
                                <tbody>

                                    @foreach($purchases as $purchase)
                                        <tr id="issueid">
                                            <td>{{$purchase->id}}</td>
                                            <td>{{$purchase->product}}</td>
                                            <td>{{$purchase->code}}</td>
                                            <td>{{$purchase->price}}</td>
                                            <td>{{$purchase->fquantity}}</td>
                                            <td>{{$purchase->price}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <button type="submit"  id="order-btn" class="btn btn-success">Order</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
