<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function searchData(Request $request){
        $srch_value = $request->post("srch_data");
        $return_data = News::Where("Tittle", "LIKE", "%".$srch_value."%")->get();
        return response($return_data);
        //echo "WORK";
    }
}
