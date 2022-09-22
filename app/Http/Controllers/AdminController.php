<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function panel(Request $request){
        //$checkAuth = $request->session()->get("userData"); // Пользовательские данные
        $category = Category::all();
        $newses = News::all();
        $products = Product::all();
        $users = User::all();
        return view("admin.Admin", ["category" => $category, "news" => $newses, "products" => $products, "users" => $users]);
    }
}
