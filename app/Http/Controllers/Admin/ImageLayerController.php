<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImageLayer;
use File;

class ImageLayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = ImageLayer::all();
        return view('admin.image_layer.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image_layer.form');
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
            'is_active' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $file_name = time() . '_image_layer.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('uploads/image_layer'), $file_name);

        $data = $request->all();
        $data['image'] = $file_name;
        $status = ImageLayer::create($data);

        if($status){
            return redirect('admin/image-layer')->with('success','Data Image Layer Berhasil ditambahkan!');
        }else{
            return redirect('admin/image-layer')->with('error','Data Image Layer Gagal ditambahkan!');
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
        $data['result'] = ImageLayer::find($id);
        return view('admin.image_layer.form',$data);
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
            'is_active' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = ImageLayer::find($id);
        $file_name = $data->image;
        if($request->image){
            if(File::exists(public_path('uploads/image_layer/'.$data->image))){
                File::delete(public_path('uploads/image_layer/'.$data->image));
            }
    
            $file_name = time() . '_image_layer.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('uploads/image_layer'), $file_name);
        }

        $input = $request->all();
        $input['image'] = $file_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/image-layer')->with('success','Data Image Layer Berhasil diubah!');
        }else{
            return redirect('admin/image-layer')->with('error','Data Image Layer Gagal diubah!');
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
        $data = ImageLayer::find($id);

        if(File::exists(public_path('uploads/image_layer/'.$data->image))){
            File::delete(public_path('uploads/image_layer/'.$data->image));
        }
        
        $status = $data->delete();
        if($status){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }
}
