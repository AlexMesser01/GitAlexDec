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
    public $output = array();
    public function searchData(Request $request){
        $srch_value = $request->post("srch_data");
        $return_data = News::Where("Tittle", "LIKE", $srch_value."%")->get();
        foreach ($return_data as  $value) {
            $categories = $value->category_news;
            $list = Category::where("category", $categories)->get();
			foreach ($list as $value) {
				$this->eng_category[] = $value->category_eng;	
			}
        }
        $this->eng_category = $this->eng_category;
		$this->output[] = $this->eng_category;
        $data = array([
            "news_info" => $return_data,
            "category" => $this->output
        ]);
        return response($data);
    }
}
