


@extends('master')
@section('container')

    <div class="border shadow-lg p-3 mb-5 bg-body rounded gap-3 " style="width:100%">
        <div class="d-grid gap-2 col-6 mx-auto" style="width:100%"  >
            <form class="d-flex" action="{{route('search')}}" method="get">
                <input class="form-control me-2" type="text" name="search" id="search" placeholder="Search items" aria-label="Search">
                <button type="submit" class="btn btn-primary btn-xs"> Search</button>
            </form>

            <form id ="AddOrder" action="{{ route('AddOrder') }}" method="POST">
            <div class="table-responsive" style="width:100%" >
                <table class="table table-striped table-bordered" style="width:100%"   >
                <thead >
                    <tr>
                        <th>S.N.</th>
                         <th>Item Name</th>
                         <th>Unit Price</th>
                         <th>Order Quanity</th>
                         <th>Total Amount</th>
                         <th>Action</th>
                    </tr>
                </thead>
                <tbody id="livesearch">
                    @foreach($itemdata as $key=>$itemdatum)

                    <tr>
                        <input hidden name="Item_id" value="{{$itemdatum->id}}">
                        <td scope="row">{{++$key}}</td>
                        <td>{{$itemdatum->itemName}}</td>
                        <td><input type="quantity" id="Price" name="Price" placeholder="{{$itemdatum->price}}" value="{{$itemdatum->price}}" disabled></td>
                        <td><input type="quantity" id="Quantity" name="Quantity"></td>
                        <td><input type="quantity" id="total" name ="total" value="" readonly="true" ></td>

                        <td>
                            <button type="submit" class="btn btn-primary btn-xs">Add</a>
                        </td>

                    </tr>
@endforeach

                </tbody >

                </table>
                {{$itemdata->links()}}
            </div>

            </form>
        </div>

    </div>

    <div class="border shadow-lg p-3 mb-5 bg-body rounded gap-3 " style="width:100%">

    <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>

                    <th scope="col">PARTICULAR</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">RATE</th>
                    <th scope="col">AMOUNT</th>
                    <th scope="col"></th>
                </tr>
                </thead>

                <tbody>

                <tr>

                    <td>Veg Momo </td>
                    <td>5</td>
                    <td>65</td>
                    <td>325</td>


                </tr>

                </tbody>

            </table>
        </div>
        <div class="d-flex">
        <div class="card   mb-3" style="max-width: 28rem;">
        <div class="d-flex">
            <label style="padding: 10px; margin:10px">Gross Amount</label>
            <input  type="text" style="padding: 10px; margin:10px"  >
        </div>
         <div class="d-flex">
                <label style="padding: 10px; margin:10px">Discount</label>
                <input type="number" style="padding: 10px; margin:10px"  >
         </div>
        <div class="d-flex">
                <label style="padding: 10px; margin:10px">Net amount</label>
                <input type="text" style="padding: 10px; margin:10px"  >
         </div>
        </div>
        <div class="card   mb-3" style="max-width: 28rem; ">
                <div class="d-flex">
                    <label style="padding: 10px; margin:10px">Tender</label>
                    <input type="number" style="padding: 10px; margin:10px"  >
                </div>
                <div class="d-flex">
                    <label style="padding: 10px; margin:10px">Change</label>
                    <input type="text" style="padding: 10px; margin:10px" >
                </div>
        </div>
        </div>

        <button class="btn btn-success">Pay</button>




    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).on('change','#Quantity',function () {
        var Qty=$(this).val();
        console.log(Qty);
        var a=$(this).parent();
        var Price = a.find('#Price').val();
        console.log(Price);



        $.ajax({

            success:function(){

                var Total = Price * Qty;
                console.log(Total);
                a.find('#Total').val(Total);




            },
            error:function(){

            }
        });


    });
    </script>











@endsection


