<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsAttribute;
use App\Models\Services;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data['news'] = News::leftJoin('users','users.id','=','news.id_user')
            ->where('news.is_active',1)
            ->get();
        $data['attribute'] = NewsAttribute::first();
        return view('news',$data);
    }

    public function show($slug)
    {
        $news = News::leftJoin('users','users.id','=','news.id_user')
        ->where('slug',$slug)->first();
        $data['news'] = $news;
        $data['late_news'] = News::leftJoin('users','users.id','=','news.id_user')
            ->where('news.is_active',1)
            ->orderBy('news.id','DESC')
            ->take(3)->get();
        $data['categories'] = Services::select('title','slug')->where('is_active',1)->get();
        $data['shareComponent'] = \Share::page(\URL::current(),$news->title)
            ->facebook()
            ->twitter()
            ->whatsapp();   
        return view('news-details',$data);
    }
}
