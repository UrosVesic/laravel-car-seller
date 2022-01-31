<?php

namespace App\Http\Controllers;
use App\Models\Sell;
use Illuminate\Http\Request;
use App\Http\Resources\SellCollection;

class UserSellController extends Controller
{
    public function index($user_id)
    {
        $sells = Sell::get()-> where('user_id',$user_id);
        if(is_null($sells)){
            return response()->json('Data not found',404);
        }
        return new SellCollection($sells);
    }

    
}
