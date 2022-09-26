<?php
    namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\Models\User;
	use App\Models\Product;
	use App\Models\News;
	use Illuminate\Support\Facades\DB;
    class StoreController extends Controller
	
	{
		public function ProductList (int $page_num = 1, $remote = "")
		{
			$prodChunk = Product::all()->chunk(15); // Делим новости на 2 
			
			$chunks = $prodChunk->map(function($chunk){
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
			dump($chunks);
			$prodChunk = $chunks[$page_num - 1]; // вычитаем 1 для совпадения с индексом и выдаем результат
			return view("store.ProductList", ["outputProduct" => $prodChunk, "current_page" => $page_num, "pages" => $chunk]);
		}
	}
?>