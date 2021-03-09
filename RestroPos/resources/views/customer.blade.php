
@extends('master')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="row">
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    </div>
                    @endif

            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <h2>Customer Registration</h2>
                <form action="{{route('addUser')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('firstname')}}</a>
                        </div>
                        <label for="firstname"> First Name</label>
                        <Input type="text" name="firstname" id="firstname" class="form-control"></Input>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('lastname')}}</a>
                        </div>
                        <label for="lastname"> Last Name </label>
                        <Input type="text" name="lastname" id="lastname" class="form-control"></Input>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('phonenumber')}}</a>
                        </div>
                        <label for="phonenumber"> Phone Number</label>
                        <Input type="text" name="phonenumber" id="phonenumber" class="form-control"></Input>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('address')}}</a>
                        </div>
                        <label for="address">Address</label>
                        <Input type="text" name="address" id="address" class="form-control"></Input>
                    </div>
                    <div class="form-group">
                        <button class="btn-primary">Register</button>
                    </div>


                </form>
            </div>
            <div class="col-md-8">
                <table class="table table-hover">
                    <tr>
                        <th>S.No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @foreach($customerData as $key=>$customerDatum)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$customerDatum->firstname}}</td>
                            <td>{{$customerDatum->lastname}}</td>
                            <td>{{$customerDatum->phonenumber}}</td>
                            <td>{{$customerDatum->address}}</td>


                            <td>
                                <a href="{{route('editUser').'/'.$customerDatum->id}}" class="btn btn-primary btn-xs">Edit</a>
                                <a href="{{route('deleteUser').'/'.$customerDatum->id}}" class="btn btn-danger btn-xs">Delete</a>

                            </td>
                            <td>{{$customerDatum->created_at->DiffForHumans()}} </td>

                        </tr>
                    @endforeach
                </table>
                {{$customerData->links()}}
            </div>


        </div>
    </div>

@endsection
