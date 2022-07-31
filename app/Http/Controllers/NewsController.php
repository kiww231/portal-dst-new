<?php

namespace App\Http\Controllers;

use App\Models\CategoryNews;
use App\Models\News;
use App\Models\NewsAttribute;
use App\Models\Services;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {   
        $search = '';
        if($_GET){
            $search = $_GET['s'];
        }
        
        $data['news'] = News::leftJoin('users','users.id','=','news.id_user')
            ->leftJoin('category_news','category_news.id','=','news.category')
            ->select('news.*','category_news.title as title_category','category_news.id as id_category','users.name')
            ->where('news.is_active',1)
            ->where('news.title', 'LIKE', "%{$search}%")
            ->orWhere('news', 'LIKE', "%{$search}%")
            ->get();
        $data['attribute'] = NewsAttribute::first();
        $data['categories'] = CategoryNews::get();
        return view('news',$data);
    }

    public function show($slug)
    {
        $news = News::leftJoin('users','users.id','=','news.id_user')
            ->leftJoin('category_news','category_news.id','=','news.category')
            ->select('news.*','category_news.title as title_category','category_news.id as id_category','users.name')
            ->where('slug',$slug)->first();
        $data['news'] = $news;
        $data['late_news'] = News::leftJoin('users','users.id','=','news.id_user')
            ->where('news.is_active',1)
            ->orderBy('news.id','DESC')
            ->take(3)->get();
        $data['categories'] = CategoryNews::get();
        $data['shareComponent'] = \Share::page(\URL::current(),$news->title)
            ->facebook()
            ->twitter()
            ->whatsapp();   
        return view('news-details',$data);
    }

    public function category($id)
    {
        $data['news'] = News::leftJoin('users','users.id','=','news.id_user')
            ->leftJoin('category_news','category_news.id','=','news.category')
            ->select('news.*','category_news.title as title_category','category_news.id as id_category','users.name')
            ->where('news.is_active',1)
            ->where('category', $id)
            ->get();
        $data['id_category'] = $id;
        $data['attribute'] = NewsAttribute::first();
        $data['categories'] = CategoryNews::get();
        return view('news',$data);
    }
}
