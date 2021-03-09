@extends('master')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Edit Details</h2>
                <form action="{{route('editActionUser')}}" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="customer_id" value="{{$editRecord->id}}">
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('firstname')}}</a>
                        </div>
                        <label for="firstname"> First Name</label>
                        <Input type="text" name="firstname" id="firstname" class="form-control" value="{{$editRecord->firstname}}"></Input>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('lastname')}}</a>
                        </div>
                        <label for="address"> Last Name</label>
                        <Input type="text" name="lastname" id="lastname" class="form-control" value="{{$editRecord->lastname}}"></Input>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('phonenumber')}}</a>
                        </div>
                        <label for="organization"> Phone Number</label>
                        <Input type="text" name="phonenumber" id="phonenumber" class="form-control" value="{{$editRecord->phonenumber}}"></Input>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('address')}}</a>
                        </div>
                        <label for="email">Address</label>
                        <Input type="text" name="address" id="address" class="form-control" value="{{$editRecord->address}}"></Input>
                    </div>

                    <div class="form-group">
                        <button class="btn-primary">Update Details</button>
                    </div>


                </form>
            </div>


        </div>
@endsection
