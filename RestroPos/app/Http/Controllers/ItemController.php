<?php

namespace App\Http\Controllers;
use App\Models\item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    function item()
    {
        $this->data['title'] = 'ItemDetails';
        $itemData = item::orderBy('id', 'desc')->paginate(8);
        return view('items', compact('itemData'), $this->data);
    }

    function edit()
    {
        return view('edititem');
    }

    function addItem(Request $request)
    {

        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'itemName' => 'required|min:3',
                'qtyStock' => 'required|min:1',
                'price' => 'required|min:1;',

            ]);
            $data['itemName'] = $request->itemName;
            $data['qtyStock'] = $request->qtyStock;
            $data['price'] = $request->price;


            if (item::create($data)) {
                return redirect()->route('items')->with('success', 'Item is Inserted');
            }
        }
    }

    public function deleteItem(Request $request)
    {
        $id = $request->user_id;
        if(item::findOrFail($id)->delete()){
            return redirect()->route('items')->with('success', 'Record is Deleted');
        }
    }

    public function editItem(Request $request){
        $id= $request->user_id;
        $editItemRecord=item::findOrFail($id);
        return view('edititem', compact('editItemRecord'));

    }
    public function editActionItem (Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'itemName' => 'required|min:3',
                'qtyStock' => 'required|min:1',
                'price' => 'required|min:1;',

            ]);
            $data['itemName'] = $request->itemName;
            $data['qtyStock'] = $request->qtyStock;
            $data['price'] = $request->price;
            $id = $request->item_id;

            if(item::where('id',$id)->update($data)){
                return redirect()->route('items')->with('success', 'Record is Updated');
            }
        }
    }
}
