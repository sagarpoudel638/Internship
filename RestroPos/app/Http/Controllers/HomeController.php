<?php

namespace App\Http\Controllers;
use App\Models\item;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    function homedata(Request $request){

      $id= $request->user_id;
      $data['Customer_id']= $id;
               $data['AmountPaid'] = 0;

        if (Orders::create($data)) {



          /**  if(Session()->has('LoggedUser')){

                $user = User::where('id','=', session('LoggedUser'))->first();
                $userdata = [
                    'LoggedUserInfo'=> $user
                ];


            }**/

            $itemdata = DB::table('item')
          ->select("*")
            ->orderBy('id', 'desc')
          ->paginate();
          $order_id = Orders::latest()->first()->id;
          $Ordersdata = DB::table('order_details')
         ->select('item.itemName','order_details.Quantity','order_details.Total','item.Price')
         ->leftjoin('item','Item.id','order_details.item_id')

         ->where('order_details.Order_id' , $order_id)
         ->simplepaginate(10);

          return view('Home')->with(compact('itemdata','Ordersdata'));


        }








    }

    function searchitems(Request $request){
        $itemdata = DB::table('item')
        ->select("*")
      ->orderBy('id', 'desc');
      if( $request->input('search')){
        $itemdata = $itemdata->where('itemName', 'LIKE', "%" . $request->search . "%");
    }

    $itemdata = $itemdata->paginate(10);

    $order_id = Orders::latest()->first()->id;
    $Ordersdata = DB::table('order_details')
   ->select('item.itemName','order_details.Quantity','order_details.Total','item.Price')
   ->leftjoin('item','Item.id','order_details.item_id')

   ->where('order_details.Order_id' , $order_id)
   ->simplepaginate(10);
    return view('Home', compact('itemdata','Ordersdata'));

    }


    function AddOrder(Request $request){
        if ($request->isMethod('get')) {
            return redirect()->back();

        }

        if ($request->isMethod('post')) {
            $order_id = Orders::latest()->first()->id; // get last id from table
            $data['Order_id']=$order_id;
            $data['Item_id'] = $request->Item_id;
            $data['Quantity'] = $request->Quantity;
            $data['Total'] = $request->Total;




            if (OrderDetails::create($data)) {
                return redirect()->route('home');
            }
        }
    }

    }
