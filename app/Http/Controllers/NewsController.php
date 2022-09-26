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
		public function newsList( $page_num = 1, $remote = "")
		{
				
				$NewsChunk = News::all()->chunk(2); // Делим новости на 2 
				$chunks = $NewsChunk->map(function($chunk){
					return $chunk = $chunk->values(); // присваиваем индексы разделенным масивам
				});
				$chunk = count($chunks); // считаем кол-во массивов
				if ($remote == "prev") {
					if ($page_num >= 2) {
						$page_num = $page_num - 1;
					}
				} else if($remote == "next") {
					if ($page_num <= $chunk - 1) {
						$page_num = $page_num + 1;
					}
				} 
				$chunkNews = $chunks[$page_num - 1]; // вычитаем 1 для совпадения с индексом и выдаем результат
			return view("news.NewsCategory", ["outputNews" => $chunkNews, "current_page" => $page_num, "pages" => $chunk]);
		}
		public function pages(){
			echo "page";
			//return view("news.NewsCategory");
		}
		public function CategoryNews( $category, $page_num = 1, $remote = "")  {
			$receiveNews =  News::where('category_news', $category)->get();
				$NewsChunk = News::where('category_news', $category)->get()->chunk(2);
				$chunks = $NewsChunk->map(function($chunk){
					return $chunk = $chunk->values();
				});
				 // Пример по индексам индексы = страница
				$chunk = count($chunks);
				if ($remote == "prev") {
					if ($page_num >= 2) {
						$page_num = $page_num - 1;
					}
				} else if($remote == "next") {
					if ($page_num <= $chunk - 1) {
						$page_num = $page_num + 1;
					}
				} 
				$chunkNews = $chunks[$page_num - 1];
				return view("news.newsPagesCategory", ["outputNews" => $chunkNews, "current_page" => $page_num, "category" => $category, "pages" => $chunk]);
		}
	}
?>	