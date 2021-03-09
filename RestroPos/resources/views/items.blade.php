
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
                <h2>Items</h2>
                <form action="{{route('addItem')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('itemName')}}</a>
                        </div>
                        <label for="itemName"> Item Name</label>
                        <Input type="text" name="itemName" id="itemName" class="form-control"></Input>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('qtyStock')}}</a>
                        </div>
                        <label for="qtyStock"> Quanity in Stock  </label>
                        <Input type="text" name="qtyStock" id="qtyStock" class="form-control"></Input>
                    </div>
                    <div class="form-group">
                        <div>
                            <a href="" style="color: red;">{{$errors->first('price')}}</a>
                        </div>
                        <label for="price"> Unit Price</label>
                        <Input type="text" name="price" id="price" class="form-control"></Input>
                    </div>

                    <div class="form-group">
                        <button class="btn-primary">Add Item</button>
                    </div>


                </form>
            </div>
            <div class="col-md-8">
                <table class="table table-hover">
                    <tr>
                        <th>S.No</th>
                        <th>Item Name</th>
                        <th>Quantity In Stock</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @foreach($itemData as $key=>$itemDatum)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$itemDatum->itemName}}</td>
                            <td>{{$itemDatum->qtyStock}}</td>
                            <td>{{$itemDatum->price}}</td>



                            <td>
                                <a href="{{route('editItem').'/'.$itemDatum->id}}" class="btn btn-primary btn-xs">Edit</a>
                                <a href="{{route('deleteItem').'/'.$itemDatum->id}}" class="btn btn-danger btn-xs">Delete</a>

                            </td>
                            <td>{{$itemDatum->created_at->DiffForHumans()}} </td>

                        </tr>
                    @endforeach
                </table>
                {{$itemData->links()}}
            </div>


        </div>
    </div>

    @endsection
