


@extends('master')
@section('container')
<div class="d-flex ">
    <div class="border shadow-lg p-3 mb-5 bg-body rounded gap-3 " style="width:50%">
        <div class="d-grid gap-2 col-6 mx-auto" style="width:100%"  >
            <form class="d-flex" action="{{route('search')}}" method="get">
                <input class="form-control me-2" type="text" name="search" id="search" placeholder="Search items" aria-label="Search">
                <button type="submit" class="btn btn-primary btn-xs"> Search</button>
            </form>
            <div class="table-responsive" style="width:100%" >
                <table class="table table-striped table-bordered" style="width:100%"   >
                <thead >
                    <tr>
                        <th>S.N.</th>
                         <th>Item Name</th>
                         <th>Unit Price</th>
                         <th>Order Quanity</th>
                         <th>Action</th>
                    </tr>
                </thead>
                <tbody id="livesearch">
                    @foreach($itemdata as $key=>$itemdatum)

                    <tr>
                        <td scope="row">{{++$key}}</td>
                        <td>{{$itemdatum->itemName}}</td>
                        <td><input type="quantity" id="Price" name="quantity" placeholder="{{$itemdatum->price}}" value="{{$itemdatum->price}}" disabled></td>
                        <td><input type="quantity" id="quantity" name="quantity"></td>

                        <td>
                            <a class="btn btn-primary btn-xs">Add</a>
                        </td>

                    </tr>
@endforeach

                </tbody >

                </table>
                {{$itemdata->links()}}
            </div>
        </div>

    </div>

    <div class="border shadow-lg p-3 mb-5 bg-body rounded gap-3 " style="width:50%">

    <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">S.N.</th>
                    <th scope="col">PARTICULAR</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">RATE</th>
                    <th scope="col">AMOUNT</th>
                    <th scope="col"></th>
                </tr>
                </thead>

                <tbody>

                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a class="btn btn-danger btn-xs">Delete</a>
                    </td>

                </tr>
                </tbody>

            </table>
        </div>
        <div class="d-flex">
        <div class="card   mb-3" style="max-width: 28rem;">
        <div class="d-flex">
            <label style="padding: 10px; margin:10px">Gross Amount</label>
            <input type="text" style="padding: 10px; margin:10px" disabled >
        </div>
         <div class="d-flex">
                <label style="padding: 10px; margin:10px">Discount</label>
                <input type="number" style="padding: 10px; margin:10px"  >
         </div>
        <div class="d-flex">
                <label style="padding: 10px; margin:10px">Net amount</label>
                <input type="text" style="padding: 10px; margin:10px" disabled >
         </div>
        </div>
        <div class="card   mb-3" style="max-width: 28rem; ">
                <div class="d-flex">
                    <label style="padding: 10px; margin:10px">Tender</label>
                    <input type="number" style="padding: 10px; margin:10px"  >
                </div>
                <div class="d-flex">
                    <label style="padding: 10px; margin:10px">Change</label>
                    <input type="text" style="padding: 10px; margin:10px" disabled >
                </div>
        </div>
        </div>




    </div>
</div>
<script>










@endsection


