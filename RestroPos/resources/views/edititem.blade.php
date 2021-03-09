@extends('master')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Edit Details</h2>
                <form action="{{route('editActionItem')}}" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="item_id" value="{{$editItemRecord->id}}">
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('itemName')}}</a>
                        </div>
                        <label for="itemName">Item Name</label>
                        <Input type="text" name="itemName" id="itemName" class="form-control" value="{{$editItemRecord->itemName}}"></Input>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('qtyStock')}}</a>
                        </div>
                        <label for="qtyStock"> Quantity in Stock</label>
                        <Input type="text" name="qtyStock" id="qtyStock" class="form-control" value="{{$editItemRecord->qtyStock}}"></Input>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('price')}}</a>
                        </div>
                        <label for="price"> Price</label>
                        <Input type="text" name="price" id="price" class="form-control" value="{{$editItemRecord->price}}"></Input>
                    </div>


                    <div class="form-group">
                        <button class="btn-primary">Update Details</button>
                    </div>


                </form>
            </div>


        </div>
@endsection
