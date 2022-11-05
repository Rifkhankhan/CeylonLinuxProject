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
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th>Order Date</th>
                                    <th>Order Time</th>
                                    <th>Net Amount</th>
                                    <th>Detail</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <a href="{{route('order.create')}}" class="btn btn-primary">Create</a>
                                </tr>
                                @foreach($orders as $order)
                                <tr class="text-center">
                                    <td>{{++$i}}</td>
                                    <td>{{$order->orderid}}</td>
                                    <td>{{$order->customerid}}</td>
                                    <td>{{$order->orderdate}}</td>
                                    <td>{{$order->ordertime}}</td>
                                    <td>{{$order->netamount}}</td>
                                    <td>
                                        <a href="{{route('order.view',$order->id)}}" class="btn btn-primary">View</a>
                                        <a href="{{route('order.edit',$order->id)}}" class="btn btn-success">Edit</a>

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
