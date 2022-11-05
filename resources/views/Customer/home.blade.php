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
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Code</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <a href="{{route('customer.create')}}" class="btn btn-primary">Create</a>
                                </tr>
                                @foreach($customers as $customer)
                                <tr class="text-center">
                                    <td>{{++$i}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->contact}}</td>
                                    <td>{{$customer->code}}</td>
                                    <td>
                                        <a href="{{route('customer.view',$customer->id)}}" class="btn btn-primary">View</a>
                                        <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{route('customer.delete',$customer->id)}}" class="btn btn-danger">Delete</a>

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
