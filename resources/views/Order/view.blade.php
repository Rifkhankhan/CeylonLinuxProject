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


                    <a href="{{route('order.home')}}" class="btn btn-secondary">Back</a>

                    <div class="container mt-3">

                    <table class="table table-hover">
                                <tbody>

                                    <tr>
                                        <th>Order ID
                                        </th>
                                        <td>
                                           {{$order->orderid}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Customer Name
                                        </th>
                                        <td>
                                            {{$customer->name}}

                                        </td>

                                    </tr>

                                    <tr>
                                        <th>Order Date
                                        </th>
                                        <td>
                                           {{$order->orderdate}}
                                        </td>

                                    </tr>

                                    <tr>
                                        <th>Order Time
                                        </th>
                                        <td>
                                        {{$order->ordertime}}

                                        </td>

                                    </tr>

                                    <tr>
                                        <th>Net Amount
                                        </th>
                                        <td>
                                        {{$order->netamount}}

                                        </td>

                                    </tr>




                                </tbody>

                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
