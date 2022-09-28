<?php
    namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\Models\User;
	use App\Models\News;
	use App\Models\Category;
	use Illuminate\Support\Facades\DB;
    class NewsController extends Controller
	
	{
		public $output = array();
		public function show(string $category = "", int $id_news = 1, Request $request)
		{
			$show_news = News::where("id_news", "=", $id_news)->first();
			//dump($show_news->Tittle);
			return view("news.News", ["news" => $show_news]);
			
		}
		public function newsList( $page_num = 1, $remote = "")
		{
				
				$NewsChunk = News::all()->chunk(4); // Делим новости на 2 
				$this->list = Category::all();
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
				foreach ($chunkNews as $value) {
					$categories = $value->category_news;
					$list = Category::where("category", $categories)->get();
					foreach ($list as $value) {
						$this->eng_category[] = $value->category_eng;	
					}
				}
				$this->eng_category = $this->eng_category;
				$this->output[] = $this->eng_category;
				return view("news.NewsCategory", ["outputNews" => $chunkNews, "eng_cate" => $this->output, "categories_list" => $this->list, "current_page" => $page_num, "pages" => $chunk]);
		}


		public function pages(){
			//return view("news.NewsCategory");
		}
		public function CategoryNews( $category, $page_num = 1, $remote = "")  {
				$this->list = Category::all();
				$receiveCateg = Category::where("category_eng", $category)->first()->category;
				$receiveNews =  News::where('category_news', $receiveCateg)->get();
				$NewsChunk = News::where('category_news', $receiveCateg)->get()->chunk(2);
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
				foreach ($chunkNews as $value) {
					$categories = $value->category_news;
					$list = Category::where("category", $categories)->get();
					foreach ($list as $value) {
						$this->eng_category[] = $value->category_eng;	
					}
				}
				$this->eng_category = $this->eng_category;
				$this->output[] = $this->eng_category;
				return view("news.newsPagesCategory", ["outputNews" => $chunkNews,	"eng_cate" => $this->output, "categories_list" => $this->list, "current_page" => $page_num, "category" => $category, "pages" => $chunk]);
		}
	}
?>	