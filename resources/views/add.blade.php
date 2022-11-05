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
                    <a href="{{route('home')}}" class="btn btn-secondary">Back</a>
                    <div class="container mt-3">
                        <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-hover">
                                <tbody>

                                    <tr>
                                        <th>Name
                                        </th>
                                        <td>
                                            <input type="text" name="name" id="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Age
                                        </th>
                                        <td>
                                            <input type="number" name="age" id="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Image
                                        </th>
                                        <td>
                                            <input type="file" name="image" id="" required>
                                        </td>
                                        <td><input type="hidden" name="status" id="status" value='active'></td>

                                    </tr>
                                    <!-- <tr>
                                        <th>Status
                                        </th>
                                        <td>
                                            <select name="status" id="">
                                                <option value="active">Active</option>
                                                <option value="inactive" selected>Inactive</option>
                                            </select>
                                        </td>
                                    </tr> -->



                                </tbody>

                            </table>
                            <button type="submit" class="btn btn-success">Create</button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection