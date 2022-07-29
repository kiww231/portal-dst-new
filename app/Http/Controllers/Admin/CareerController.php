<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Career;
use App\Models\CareerAttribute;
use File;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Career::all();
        return view('admin.career.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.career.form');
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
            'title' => 'required|unique:career',
            'short_description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'is_active' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $thumbnail_name = time() . '_thumbnail.' . $request->file('thumbnail')->extension();
        $request->file('thumbnail')->move(public_path('storage/career'), $thumbnail_name);
        
        $image_name = time() . '_image.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('storage/career'), $image_name);
        
        $banner_name = time() . '_banner.' . $request->file('banner')->extension();
        $request->file('banner')->move(public_path('storage/career'), $banner_name);

        $data = $request->all();
        $data['start_date'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->start_date)));
        $data['end_date'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->end_date)));
        $data['thumbnail'] = $thumbnail_name;
        $data['image'] = $image_name;
        $data['banner'] = $banner_name;
        $data['slug'] = Str::slug($request->title);
        $status = Career::create($data);

        if($status){
            return redirect('admin/career')->with('success','Data Career Berhasil ditambahkan!');
        }else{
            return redirect('admin/career')->with('error','Data Career Gagal ditambahkan!');
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
        $data['result'] = Career::find($id);
        return view('admin.career.form',$data);
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
            'title' => 'required|unique:career,id,'.$id,
            'short_description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'is_active' => 'required',
            'thumbnail' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'banner' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = Career::find($id);
        
        $thumbnail_name = $data->thumbnail;
        $image_name = $data->image;
        $banner_name = $data->banner;
        if($request->thumbnail){
            if(File::exists(public_path('storage/career/'.$data->thumbnail))){
                File::delete(public_path('storage/career/'.$data->thumbnail));
            }
    
            $thumbnail_name = time() . '_thumbnail.' . $request->file('thumbnail')->extension();
            $request->file('thumbnail')->move(public_path('storage/career'), $thumbnail_name);
        }
        if($request->image){
            if(File::exists(public_path('storage/career/'.$data->image))){
                File::delete(public_path('storage/career/'.$data->image));
            }
    
            $image_name = time() . '_image.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('storage/career'), $image_name);
        }
        if($request->banner){
            if(File::exists(public_path('storage/career/'.$data->banner))){
                File::delete(public_path('storage/career/'.$data->banner));
            }
    
            $banner_name = time() . '_banner.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('storage/career'), $banner_name);
        }
        $input = $request->all();
        $input['start_date'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->start_date)));
        $input['end_date'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->end_date)));
        $input['thumbnail'] = $thumbnail_name;
        $input['image'] = $image_name;
        $input['banner'] = $banner_name;
        $input['slug'] = Str::slug($request->title);
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/career')->with('success','Data career Berhasil diubah!');
        }else{
            return redirect('admin/career')->with('error','Data career Gagal diubah!');
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
        $data = Career::find($id);

        if(File::exists(public_path('storage/career/'.$data->thumbnail))){
            File::delete(public_path('storage/career/'.$data->thumbnail));
        }
        
        if(File::exists(public_path('storage/career/'.$data->image))){
            File::delete(public_path('storage/career/'.$data->image));
        }

        if(File::exists(public_path('storage/career/'.$data->banner))){
            File::delete(public_path('storage/career/'.$data->banner));
        }
        
        $status = $data->delete();
        if($status){
            return response()->json('success');
        }else{
            return response()->json('error');
        }
    }

    public function attribute()
    {
        $data['result'] = CareerAttribute::first();
        return view('admin.career.form-attribute',$data);
    }

    public function attributeUpdate(Request $request, $id)
    {
        $request->validate([
            'banner' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = CareerAttribute::find($id);
        $banner_name = $data->banner;
        if($request->banner){
            if(File::exists(public_path('storage/banner/'.$data->banner))){
                File::delete(public_path('storage/banner/'.$data->banner));
            }
    
            $banner_name = time() . '_career_attribute.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('storage/banner'), $banner_name);
        }

        $input = $request->all();
        $input['banner'] = $banner_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/career-attribute')->with('success','Data Attribute career Berhasil diubah!');
        }else{
            return redirect('admin/career-attribute')->with('error','Data Attribute career Gagal diubah!');
        }
    }
}
