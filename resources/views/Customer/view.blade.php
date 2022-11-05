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


                    <a href="{{route('customer.home')}}" class="btn btn-secondary">Back</a>

                    <div class="container mt-3">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name
                                    </th>
                                    <td>
                                        {{$customer->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Price
                                    </th>
                                    <td>
                                        {{$customer->price}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Code
                                    </th>
                                    <td>
                                        {{$customer->code}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Expiry Date
                                    </th>
                                    <td>
                                        {{$customer->expirydate}}
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
