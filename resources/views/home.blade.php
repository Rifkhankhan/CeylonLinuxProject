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
                                    <th>Age</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <a href="{{route('create')}}" class="btn btn-primary">Create</a>
                                </tr>
                                @foreach($students as $student)
                                <tr class="text-center">
                                    <td>{{++$i}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->age}}</td>
                                    <td>
                                        <img style="width:150px;height:150px;margin:0%;padding:0%;"
                                            src="{{ asset($student->image) }}">
                                    </td>

                                    <td>
                                        <a href="{{route('view',$student->id)}}" class="btn btn-primary">View</a>
                                        <a href="{{route('edit',$student->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{route('delete',$student->id)}}" class="btn btn-danger">Delete</a>

                                    </td>

                                    <td>
                                        <form action="{{route('status',$student->id)}}" method="get">
                                            @if($student->status=='active')
                                            <button type="submit" class="btn btn-danger">Inactive</button>
                                            @elseif($student->status=='inactive')
                                            <button type="submit" class="btn btn-primary">Active</button>
                                            @endif
                                        </form>
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
