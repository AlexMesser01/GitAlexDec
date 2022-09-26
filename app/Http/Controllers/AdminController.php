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
    public $postData;

    public function panel(Request $request){
        //$checkAuth = $request->session()->get("userData"); // Пользовательские данные     
        $category = Category::all();
        $newses = News::all();
        $products = Product::all();
        $users = User::all();
        $this->postData = $request->post();
        dump($this->postData);
       if ($request->post() != []) {
        if (isset($this->postData["add"])) {
            if ($this->postData["add"] == "new_news") {
                $this->addNews($request);
            } else {
                $this->addProduct($request);
            }
        } else {
            $this->deleteUser($request);
            }
        }
        

        return view("admin.Admin", ["category" => $category, "news" => $newses, "products" => $products, "users" => $users]);
    }
    public function addNews($request){
        $checkNews = News::where("Tittle", "=", $request->post()["tittle"])->first();
        if (is_null($checkNews)) {
            $news = new News;
            $news->Tittle = $this->postData["tittle"];
            $news->public_date = $this->postData["public_date"];
            $news->category_news = $this->postData["category"];
            $news->content = $this->postData["content"];
            $news->author_news = $request->session()->get("userData")->Username;
            $news->save();
        }
    }
    public function addProduct($request){
        $checkProd = Product::where("product_name", "=", $request->post()["product_name"])->first();      
        if (is_null($checkProd)) {
            $Product = new Product;
            $Product->product_name = $this->postData["product_name"];
            $Product->descript = $this->postData["descript"];
            $Product->price = $this->postData["cost"];
            $Product->avaliable = $this->postData["avaliable"];
            $Product->img = $this->imageEdit($request);
            $Product->save();
        }
    }
    public function imageEdit($request){
        $file = $request->file('ProdImg');
        $basepath = explode( "\\", $file->getPathName());
        $tmp_name = end($basepath);
        $filename = explode(".",$tmp_name)[0].".png";
        $file->move(base_path("public\\img\\prodImg"), $filename);
        return "public\\img\\prodImg\\".$filename;
    }
    public function deleteUser($request){
        $user = $request->post("del_user");
        User::where("Username", "=", $user)->delete();
    }

}
