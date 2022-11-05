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
                                    <th>Address
                                    </th>
                                    <td>
                                        {{$customer->Address}}
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
                                    <th>Contact
                                    </th>
                                    <td>
                                        {{$customer->contact}}
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
