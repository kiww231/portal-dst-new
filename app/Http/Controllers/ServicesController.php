<?php

namespace App\Http\Controllers;

use App\Models\ServicesAttribute;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $data['services_attribute'] = ServicesAttribute::first();
        $data['services'] = Services::where('is_active',1)->get();
        $data['services_help'] = Services::where('is_active',1)->where('is_help',1)->get();
        return view('services',$data);
    }

    public function show($slug)
    {
        $data['result'] = Services::where('slug',$slug)->first();
        $data['categories'] = Services::select('title','slug')->where('is_active',1)->get();
        $data['services_att'] = ServicesAttribute::first();
        return view('services-details',$data);
    }
}
