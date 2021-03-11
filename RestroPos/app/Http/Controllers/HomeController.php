<?php

namespace App\Http\Controllers;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function AddData(Request $request){
        $id= $request->user_id;
        $AddItem = item::findOrFail($id);
    }
}
