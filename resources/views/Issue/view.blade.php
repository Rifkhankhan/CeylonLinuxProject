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


                    <a href="{{route('issue.home')}}" class="btn btn-secondary">Back</a>

                    <div class="container mt-3">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Free Issue Label
                                    </th>
                                    <td>
                                        {{$purchase->issue}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Type
                                    </th>
                                    <td>
                                        {{$purchase->type}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Purchase Product
                                    </th>
                                    <td>
                                        {{$purchase->product}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Free Product
                                    </th>
                                    <td>
                                        {{$purchase->freeproduct}}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Purchase Quantity
                                    </th>
                                    <td>
                                        {{$purchase->pquantity}}
                                    </td>
                                </tr>


                                <tr>
                                    <th>Free Quantity
                                    </th>
                                    <td>
                                        {{$purchase->fquantity}}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Lower Limit
                                    </th>
                                    <td>
                                        {{$purchase->lowerlimit}}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Upper Limit
                                    </th>
                                    <td>
                                        {{$purchase->upperlimit}}
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
