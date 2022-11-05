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
                    <a href="{{route('issue.home')}}" class="btn btn-secondary " class="m-2">Back</a>
                    <div class="container mt-3">
                        <form method="POST" action="{{route('issue.store')}}" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-hover">


                                <tbody>

                                    <tr>
                                        <th>Free Issue Label
                                        </th>
                                        <td>
                                            <input type="text" name="name" id="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Type
                                        </th>
                                        <td>
                                            <select name="type" id="">
                                                <option value="flat">Flat</option>
                                                <option value="multiple">Multiple</option>
                                            </select>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th>Purchase Product
                                        </th>
                                        <td>
                                            <select name="purchaseproduct" id="" class="p-1">
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                    </tr>

                                    <tr>
                                        <th>Free Product
                                        </th>
                                        <td>
                                            <select name="freeproduct" id="" class="p-1">
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                    </tr>

                                    <tr>
                                        <th>Purchase Quantity
                                        </th>
                                        <td>
                                            <input type="number" name="pquantity" id="" min='0' required>
                                        </td>

                                    </tr>

                                    <tr>
                                        <th>Free Quantity
                                        </th>
                                        <td>
                                            <input type="number" name="fquantity" id=""  min='0'  required>
                                        </td>

                                    </tr>


                                    <tr>
                                        <th>Lower Limit
                                        </th>
                                        <td>
                                            <input type="number" name="lowerlimit" id=""  min='0' required>
                                        </td>

                                    </tr>


                                    <tr>
                                        <th>Upper Limit
                                        </th>
                                        <td>
                                            <input type="number" name="upperlimit" id=""  min='0'  required>
                                        </td>

                                    </tr>




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
