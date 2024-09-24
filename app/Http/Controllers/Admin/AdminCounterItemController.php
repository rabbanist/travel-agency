<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CounterItem;
use Illuminate\Http\Request;

class AdminCounterItemController extends Controller
{
    public function index(){
        $item = CounterItem::where('id',1)->first();
        return view('admin.pages.counter.index',compact('item'));
    }

    public function update(Request $request){
        $request->validate([
            'item1_number' => 'required',
            'item1_text' => 'required',
            'item2_number' => 'required',
            'item2_text' => 'required',
            'item3_number' => 'required',
            'item3_text' => 'required',
            'item4_number' => 'required',
            'item4_text' => 'required',
            'status' => 'required',
        ]);

        $counter_item = CounterItem::find(1);
        $counter_item->item1_number = $request->item1_number;
        $counter_item->item1_text = $request->item1_text;
        $counter_item->item2_number = $request->item2_number;
        $counter_item->item2_text = $request->item2_text;
        $counter_item->item3_number = $request->item3_number;
        $counter_item->item3_text = $request->item3_text;
        $counter_item->item4_number = $request->item4_number;
        $counter_item->item4_text = $request->item4_text;
        $counter_item->status = $request->status;
        $counter_item->save();

        return redirect()->route('admin.counter-item.index')->with('success','Counter Item Updated Successfully');
    }



}
