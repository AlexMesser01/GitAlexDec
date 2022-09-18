<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public $str;
    public $arr;
    public $arr2;
    public $int;
    public $isAuth;
    public function testing(){
        $this->arr2 = [
            "text" => array("text1","text2"),
            "href" => array("href1", "href2")
        ];
        //$collection = collect($this->arr2)->contains( 1, "text2"); Тесто наличия значения
        $collection = collect($this->arr2)->count();
        //dd($collection);
        $this->arr = ["asoc1" => 1, "asoc2" => 2];
        $this->str = "";
        $this->int = 5;
        $this->isAuth = true;
        // Тест миграций
        
        return view("test.testing", ["array" => $this->arr, "integer" => $this->int, "string" => $this->str, "auth" => $this->isAuth, "links" => $this->arr2]);
    }
}
