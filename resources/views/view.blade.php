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


                    <a href="{{route('home')}}" class="btn btn-secondary">Back</a>

                    <div class="container mt-3">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name
                                    </th>
                                    <td>
                                        {{$student->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Age
                                    </th>
                                    <td>
                                        {{$student->age}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Image
                                    </th>
                                    <td>
                                        <img style="width:150px;height:150px;margin:0%;padding:0%;"
                                            src="{{ asset($student->image) }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status
                                    </th>
                                    <td>
                                        <strong>

                                            {{ $student->status == 'active' ? 'Active' : 'Inactive' }}
                                        </strong>

                                    </td>
                                </tr>

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