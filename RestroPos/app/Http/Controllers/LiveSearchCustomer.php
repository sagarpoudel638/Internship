<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearchCustomer extends Controller
{
    function searchAction(Request $request)
    {

     if($request->ajax())
     {
      $result = '';

      $queries = $request->get('query');
      if($queries != '')
      {
       $searchcustomerdata = DB::table('customer')
         ->where('firstname', 'like', '%'.$queries.'%')
         ->orderBy('id', 'desc')
         ->get();


      }


      $total_row = $searchcustomerdata->count();

      if($total_row > 0)
      {

       foreach($searchcustomerdata as $row)
       {

        $result .= '
        <tr id="livesearchcustomer">


        <td>'.$row->firstname.'</td>
        <td>'.$row->lastname.'</td>
        <td>'.$row->phonenumber.'</td>

         <td><a href="{{route("showitems")}}" class="btn btn-primary btn-xs">Add</a></td>

        </tr>
        ';
       }
      }
      else
      {
       $result = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $searchcustomerdata = array(
       'table_data_customer'  => $result,

      );

      echo json_encode($searchcustomerdata);
     }
    }
}
