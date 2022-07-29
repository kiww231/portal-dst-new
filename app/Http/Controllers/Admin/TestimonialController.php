<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Testimonial::get();
        return view('admin.testimonial.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'testimoni' => 'required|min:120',
            'is_active' => 'required',
        ]);

        $data = $request->all();
        $status = Testimonial::create($data);

        if($status){
            return redirect('admin/testimonial')->with('success','Data Testimonial Berhasil ditambahkan!');
        }else{
            return redirect('admin/testimonial')->with('error','Data Testimonial Gagal ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['result'] = Testimonial::find($id);
        return view('admin.testimonial.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'testimoni' => 'required|min:120',
            'is_active' => 'required',
        ]);

        $data = Testimonial::find($id);

        $input = $request->all();
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/testimonial')->with('success','Data Testimonial Berhasil diubah!');
        }else{
            return redirect('admin/testimonial')->with('error','Data Testimonial Gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Testimonial::find($id);
        $status = $data->delete();
        if($status){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }
}
