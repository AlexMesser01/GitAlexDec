<?php
    namespace App\Http\Controllers;
 

     
    class MainController extends Controller
    {
        public function index()
        {
           //return "Main::class";
           return view("main.Main");
        }
    }
?>