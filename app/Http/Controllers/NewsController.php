<?php
    namespace App\Http\Controllers;
    class NewsController extends Controller
	{
		public function page(int $page_num = 1)
		{
			return view("news.News", ["page_number" => $page_num]);
			
		}
		public function category($id_cat, $id_news = 1)
		{
			return view("news.NewsCategory", ["category" => $id_cat, "news_id" => $id_news]);
		}
	}
?>	