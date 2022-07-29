<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\About;
use App\Models\Team;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        $data['about'] = About::first();
        $data['brand'] = Brand::where('is_active',1)->get();
        $data['team'] = Team::where('is_active',1)->get();
        $data['testimonial'] = Testimonial::where('is_active',1)->get();
        return view('about',$data);
    }
}
