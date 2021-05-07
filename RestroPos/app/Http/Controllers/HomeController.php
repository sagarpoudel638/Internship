<?php

namespace App\Http\Controllers;
use App\Models\item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function AddData(Request $request){



    }

    function homedata(){
        if(Session()->has('LoggedUser')){

            $user = User::where('id','=', session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=> $user
            ];


        }

        $itemdata = DB::table('item')
      ->select("*")
    ->orderBy('id', 'desc')
      ->paginate();

        return view('home')->with(compact('data','itemdata'));


    }

    function searchitems(Request $request){
        $itemdata = DB::table('item')
        ->select("*")
      ->orderBy('id', 'desc');
      if( $request->input('search')){
        $itemdata = $itemdata->where('itemName', 'LIKE', "%" . $request->search . "%");
    }
    $itemdata = $itemdata->paginate(10);
    return view('home', compact('itemdata'));

    }


}
