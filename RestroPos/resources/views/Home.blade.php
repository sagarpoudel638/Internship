


@extends('master')
@section('container')
<div class="d-flex ">
    <div class="border shadow-lg p-3 mb-5 bg-body rounded gap-3 " style="width:50%">
        <div class="d-grid gap-2 col-6 mx-auto" >
            <form class="d-flex">
                <input class="form-control me-2" type="text" name="search" id="search" placeholder="Search items" aria-label="Search">
            </form>
            <div class="table-responsive" style="width:auto" >
                <table class="table table-striped table-bordered"  >
                <thead >
                    <tr>
                         <th>Item Name</th>
                         <th>Available Quantity</th>
                         <th>Price</th>
                    </tr>
                </thead>
                <tbody id="livesearch">
                </tbody >
                
                </table>
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
                    <td><input type="number" ></td>
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
        <div class="d-flex">
            <form style="width:25%">
                <input class="form-control me-2" style="padding: 10px; margin:10px"type="search" placeholder="Search Customer" aria-label="Search" >
                <button type="button" class="btn btn-primary btn-small" style="padding: 10px; margin:10px">Print Receipt</button>
            </form>
        </div>
            

        
    </div>
</div>
<script>
$(document).ready(function(){
 fetch_customer_data();
 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('#livesearch').html(data.table_data);
    
   }
  })
 }
 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>
@endsection


