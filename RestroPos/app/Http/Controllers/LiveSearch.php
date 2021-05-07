<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearch extends Controller
{


    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('item')
         ->where('itemName', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();


      }
      else
      {

       $data = DB::table('item')
        ->orderBy('id', 'desc')
         ->get();
      }

      $total_row = $data->count();

      if($total_row > 0)
      {

       foreach($data as $row)
       {

        $output .= '
        <tr id="livesearch">


        <td>'.$row->itemName.'</td>
         <td>'.$row->qtyStock.'</td>
         <td>'.$row->price.'</td>
         <td><input type="number"></td>
         <td><a href="javascript:void(0)" id="edit"  value="'.$row->id.'" class="btn btn-success btn-xs">Add</a></td>

        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,

      );

      echo json_encode($data);
     }
    }
}
