<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageLayer;
use App\Models\Brand;
use App\Models\About;
use App\Models\HomePage;
use App\Models\News;
use App\Models\Projects;
use App\Models\Testimonial;
use App\Models\Services;

class HomeController extends Controller
{
    public function index()
    {
        $data['image_layer'] = ImageLayer::where('is_active',1)->get();
        $data['brand'] = Brand::where('is_active',1)->get();
        $data['about'] = About::first();
        $data['home_page'] = HomePage::first();
        $data['testimonial'] = Testimonial::where('is_active',1)->get();
        $data['services_feature'] = Services::where('is_active',1)->where('is_feature',1)->get();
        $data['services_improve'] = Services::where('is_active',1)->where('is_improve',1)->get();
        $data['services'] = Services::where('is_active',1)->orderBy('id','DESC')->take(3)->get();
        $data['projects'] = Projects::where('is_active',1)->orderBy('id','DESC')->get();
        $data['news'] = News::leftJoin('users','users.id','=','news.id_user')
            ->where('news.is_active',1)->orderBy('news.id','DESC')->take(3)->get();
        return view('home',$data);
    }
}
