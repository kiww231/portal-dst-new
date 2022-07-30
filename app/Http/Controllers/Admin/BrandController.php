<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Brand::all();
        return view('admin.brand.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.form');
    }

    /**
     * Store a newly created resource in uploads.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'is_active' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $file_name = time() . '_brand.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('uploads/brand'), $file_name);

        $data = $request->all();
        $data['image'] = $file_name;
        $status = Brand::create($data);

        if($status){
            return redirect('admin/brand')->with('success','Data Brand Berhasil ditambahkan!');
        }else{
            return redirect('admin/brand')->with('error','Data Brand Gagal ditambahkan!');
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
        $data['result'] = Brand::find($id);
        return view('admin.brand.form',$data);
    }

    /**
     * Update the specified resource in uploads.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'is_active' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = Brand::find($id);
        $file_name = $data->image;
        if($request->image){
            if(File::exists(public_path('uploads/brand/'.$data->image))){
                File::delete(public_path('uploads/brand/'.$data->image));
            }
    
            $file_name = time() . '_brand.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('uploads/brand'), $file_name);
        }

        $input = $request->all();
        $input['image'] = $file_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/brand')->with('success','Data Brand Berhasil diubah!');
        }else{
            return redirect('admin/brand')->with('error','Data Brand Gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from uploads.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Brand::find($id);

        if(File::exists(public_path('uploads/brand/'.$data->image))){
            File::delete(public_path('uploads/brand/'.$data->image));
        }
        
        $status = $data->delete();
        if($status){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }
}
