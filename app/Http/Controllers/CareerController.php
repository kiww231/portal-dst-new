<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\CareerAttribute;

class CareerController extends Controller
{
    public function index()
    {
        $data['career'] = Career::where('is_active',1)->get();
        $data['attribute'] = CareerAttribute::first();
        return view('career',$data);
    }

    public function show($slug)
    {
        $career = Career::where('slug',$slug)->first();
        $data['career'] = $career;
        $data['shareComponent'] = \Share::page(\URL::current(),$career->title)
            ->facebook()
            ->twitter()
            ->whatsapp();
        return view('career-details',$data);
    }
}
