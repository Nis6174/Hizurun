<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        // 人気商品（販売数の降順）
        $popularProduct = Product::orderBy('sales', 'desc')->take(3)->get();
        // カテゴリー別
        $categories = Category::whereNull('parent_id')->with('children')->get();
        // おすすめ商品
        $recommendedProducts = Product::inRandomOrder()->take(5)->get();
        // return
        return view();
    }
}
