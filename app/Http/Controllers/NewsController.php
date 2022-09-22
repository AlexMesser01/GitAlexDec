<?php
    namespace App\Http\Controllers;
	use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use Illuminate\Support\Facades\DB;
    class NewsController extends Controller
	
	{
		public function show(string $category, int $id_news = 1, Request $request)
		{
			//dump($id_news);
			$show_news = News::where("id_news", "=", $id_news)->first();
			//dump($show_news->Tittle);
			return view("news.News", ["news" => $show_news]);
			
		}
		public function newsList(string $category = "")
		{
			if (empty($category)) {
				$receiveNews = News::all();
			} else {
				$receiveNews =  News::where('category_news', $category)->get();
			}
			//dump($category);
			return view("news.NewsCategory", ["outputNews" => $receiveNews]);
		}
	}
?>	