<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data['contact'] = Contact::first();
        return view('contact',$data);
    }

    public function testimoni(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'testimoni' => 'required|min:120',
        ]);
        $data = $request->all();
        $data['is_active'] = 1;
        $status = Testimonial::create($data);
        if($status){
            return redirect('contact')->with('success','Data Testimoni Berhasil dikirim!');
        }else{
            return redirect('contact')->with('error','Data Testimoni Gagal dikirim!');
        }
    }
}
