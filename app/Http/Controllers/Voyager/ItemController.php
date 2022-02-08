<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Models\Item;

class ItemController extends VoyagerBaseController
{
    public function approveItem (){
        $item = Item::where('id', \request("id"))->first();
        $item -> approved = 1; 
        $item ->save();
        return redirect(route('voyager.items.index'));
    }

}
