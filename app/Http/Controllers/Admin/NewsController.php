<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Auth::user()->type == 1 ? News::all() : News::where('id_user',Auth::user()->id)->get();
        return view('admin.news.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.form');
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
            'title' => 'required|unique:news',
            'date' => 'required',
            'news' => 'required',
            'is_active' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $thumbnail_name = time() . '_thumbnail.' . $request->file('thumbnail')->extension();
        $request->file('thumbnail')->move(public_path('uploads/news'), $thumbnail_name);

        $image_name = time() . '_image.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('uploads/news'), $image_name);
        
        $banner_name = time() . '_banner.' . $request->file('banner')->extension();
        $request->file('banner')->move(public_path('uploads/news'), $banner_name);

        $data = $request->all();
        $data['date'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->date)));
        $data['id_user'] = Auth::user()->id;
        $data['thumbnail'] = $thumbnail_name;
        $data['image'] = $image_name;
        $data['banner'] = $banner_name;
        $data['slug'] = Str::slug($request->title);
        $status = News::create($data);

        if($status){
            return redirect('admin/news')->with('success','Data News Berhasil ditambahkan!');
        }else{
            return redirect('admin/news')->with('error','Data News Gagal ditambahkan!');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['result'] = News::find($id);
        return view('admin.news.form',$data);
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
            'title' => 'required|unique:news,id,'.$id,
            'news' => 'required',
            'date' => 'required',
            'is_active' => 'required',
            'thumbnail' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'banner' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = News::find($id);
        
        $thumbnail_name = $data->thumbnail;
        $image_name = $data->image;
        $banner_name = $data->banner;
        if($request->thumbnail){
            if(File::exists(public_path('uploads/news/'.$data->thumbnail))){
                File::delete(public_path('uploads/news/'.$data->thumbnail));
            }
    
            $thumbnail_name = time() . '_thumbnail.' . $request->file('thumbnail')->extension();
            $request->file('thumbnail')->move(public_path('uploads/news'), $thumbnail_name);
        }
        if($request->image){
            if(File::exists(public_path('uploads/news/'.$data->image))){
                File::delete(public_path('uploads/news/'.$data->image));
            }
    
            $image_name = time() . '_image.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('uploads/news'), $image_name);
        }
        if($request->banner){
            if(File::exists(public_path('uploads/news/'.$data->banner))){
                File::delete(public_path('uploads/news/'.$data->banner));
            }
    
            $banner_name = time() . '_banner.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('uploads/news'), $banner_name);
        }
        $input = $request->all();
        $input['date'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->date)));
        $input['thumbnail'] = $thumbnail_name;
        $input['image'] = $image_name;
        $input['banner'] = $banner_name;
        $input['id_user'] = $data->id_user ? $data->id_user : Auth::user()->id;
        $input['slug'] = Str::slug($request->title);
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/news')->with('success','Data news Berhasil diubah!');
        }else{
            return redirect('admin/news')->with('error','Data news Gagal diubah!');
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
        $data = News::find($id);

        if(File::exists(public_path('uploads/news/'.$data->thumbnail))){
            File::delete(public_path('uploads/news/'.$data->thumbnail));
        }

        if(File::exists(public_path('uploads/news/'.$data->image))){
            File::delete(public_path('uploads/news/'.$data->image));
        }

        if(File::exists(public_path('uploads/news/'.$data->banner))){
            File::delete(public_path('uploads/news/'.$data->banner));
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
        $data['result'] = NewsAttribute::first();
        return view('admin.news.form-attribute',$data);
    }

    public function attributeUpdate(Request $request, $id)
    {
        $request->validate([
            'banner' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = NewsAttribute::find($id);
        $banner_name = $data->banner;
        if($request->banner){
            if(File::exists(public_path('uploads/banner/'.$data->banner))){
                File::delete(public_path('uploads/banner/'.$data->banner));
            }
    
            $banner_name = time() . '_news_attribute.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('uploads/banner'), $banner_name);
        }

        $input = $request->all();
        $input['banner'] = $banner_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/news-attribute')->with('success','Data Attribute News Berhasil diubah!');
        }else{
            return redirect('admin/news-attribute')->with('error','Data Attribute News Gagal diubah!');
        }
    }
}
