@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
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

                        <table class="table table-hover  table-bordered">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Free Issue Label</th>
                                    <th>Type</th>
                                    <th>Purchase Product</th>
                                    <th>Free Product</th>
                                    <th>Purchase Quantity</th>
                                    <th>Free Quantity</th>
                                    <th>Lower Limit</th>
                                    <th>Upper Quantity</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <a href="{{route('issue.create')}}" class="btn btn-primary">Create</a>
                                </tr>
                                @foreach($issues as $issue)
                                <tr class="text-center">
                                    <td>{{++$i}}</td>
                                    <td>{{$issue->name}}</td>
                                    <td>{{$issue->type}}</td>
                                    <td>{{$issue->purchaseproduct}}</td>
                                    <td>{{$issue->freeproduct}}</td>
                                    <td>{{$issue->pquantity}}</td>
                                    <td>{{$issue->fquantity}}</td>
                                    <td>{{$issue->lowerlimit}}</td>
                                    <td>{{$issue->upperlimit}}</td>
                                    <td>
                                        <a href="{{route('issue.view',$issue->id)}}" class="btn btn-primary">View</a>
                                        <a href="{{route('issue.edit',$issue->id)}}" class="btn btn-success">Edit</a>

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
