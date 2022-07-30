<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicesAttribute;
use App\Models\Services;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Services::all();
        return view('admin.services.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.form');
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
            'title' => 'required|unique:services',
            'short_description' => 'required',
            'description' => 'required|min:500',
            'is_active' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'icon' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image_name = time() . '_image.' . $request->file('image')->extension();
        $request->file('image')->move(public_path('uploads/services'), $image_name);

        $icon_name = time() . '_icon.' . $request->file('icon')->extension();
        $request->file('icon')->move(public_path('uploads/services'), $icon_name);

        $banner_name = time() . '_banner.' . $request->file('banner')->extension();
        $request->file('banner')->move(public_path('uploads/services'), $banner_name);

        $data = $request->all();
        $data['image'] = $image_name;
        $data['icon'] = $icon_name;
        $data['banner'] = $banner_name;
        $data['is_help'] = $request->is_help == 1 ? 1 : 0;
        $data['is_feature'] = $request->is_feature == 1 ? 1 : 0;
        $data['is_improve'] = $request->is_improve == 1 ? 1 : 0;
        $data['slug'] = Str::slug($request->title);
        $status = Services::create($data);

        if($status){
            return redirect('admin/services')->with('success','Data Services Berhasil ditambahkan!');
        }else{
            return redirect('admin/services')->with('error','Data Services Gagal ditambahkan!');
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
        $data['result'] = Services::find($id);
        return view('admin.services.form',$data);
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
            'title' => 'required|unique:services,id,'.$id,
            'short_description' => 'required',
            'description' => 'required|min:500',
            'is_active' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'icon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'banner' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data = Services::find($id);
        
        $image_name = $data->image;
        $icon_name = $data->icon;
        $banner_name = $data->banner;
        if($request->image){
            if(File::exists(public_path('uploads/services/'.$data->image))){
                File::delete(public_path('uploads/services/'.$data->image));
            }
    
            $image_name = time() . '_image.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('uploads/services'), $image_name);
        }
        if($request->icon){
            if(File::exists(public_path('uploads/services/'.$data->icon))){
                File::delete(public_path('uploads/services/'.$data->icon));
            }
    
            $icon_name = time() . '_icon.' . $request->file('icon')->extension();
            $request->file('icon')->move(public_path('uploads/services'), $icon_name);
        }
        if($request->banner){
            if(File::exists(public_path('uploads/services/'.$data->banner))){
                File::delete(public_path('uploads/services/'.$data->banner));
            }
    
            $banner_name = time() . '_banner.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('uploads/services'), $banner_name);
        }

        $input = $request->all();
        $input['image'] = $image_name;
        $input['icon'] = $icon_name;
        $input['banner'] = $banner_name;
        $input['is_help'] = $request->is_help == 1 ? 1 : 0;
        $input['is_feature'] = $request->is_feature == 1 ? 1 : 0;
        $input['is_improve'] = $request->is_improve == 1 ? 1 : 0;
        $input['slug'] = Str::slug($request->title);
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/services')->with('success','Data Services Berhasil diubah!');
        }else{
            return redirect('admin/services')->with('error','Data Services Gagal diubah!');
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
        $data = Services::find($id);

        if(File::exists(public_path('uploads/services/'.$data->image))){
            File::delete(public_path('uploads/services/'.$data->image));
        }

        if(File::exists(public_path('uploads/services/'.$data->icon))){
            File::delete(public_path('uploads/services/'.$data->icon));
        }

        if(File::exists(public_path('uploads/services/'.$data->banner))){
            File::delete(public_path('uploads/services/'.$data->banner));
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
        $data['result'] = ServicesAttribute::first();
        return view('admin.services.form-attribute',$data);
    }

    public function attributeUpdate(Request $request, $id)
    {
        $request->validate([
            'video_is_active' => 'required',
            'help_is_active' => 'required',
            'business_is_active' => 'required',
            'benefits_is_active' => 'required',
            'faq_is_active' => 'required',
            'banner' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if($request->video_is_active == 1){
            $request->validate([
                'video_title' => 'required',
                'video_url' => 'required',
                'video_thumbnail' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
        }

        if($request->help_is_active == 1){
            $request->validate([
                'help_title' => 'required',
                'help_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
        }

        if($request->business_is_active == 1){
            $request->validate([
                'business_tagline' => 'required',
                'business_title' => 'required',
                'business_desc' => 'required',
            ]);
        }

        if($request->benefits_is_active == 1){
            $request->validate([
                'benefits_title' => 'required',
                'benefits_desc' => 'required',
                'benefits_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
        }

        $data = ServicesAttribute::find($id);
        $banner_name = $data->banner;
        $video_name = $data->video_thumbnail;
        $help_name = $data->help_image;
        $benefits_name = $data->benefits_image;
        if($request->banner){
            if(File::exists(public_path('uploads/banner/'.$data->banner))){
                File::delete(public_path('uploads/banner/'.$data->banner));
            }
    
            $banner_name = time() . '_services_attribute.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('uploads/banner'), $banner_name);
        }

        if($request->video_thumbnail){
            if(File::exists(public_path('uploads/services/'.$data->video_thumbnail))){
                File::delete(public_path('uploads/services/'.$data->video_thumbnail));
            }
    
            $video_name = time() . '_video_thumbnail.' . $request->file('video_thumbnail')->extension();
            $request->file('video_thumbnail')->move(public_path('uploads/services'), $video_name);
        }

        if($request->help_image){
            if(File::exists(public_path('uploads/services/'.$data->help_image))){
                File::delete(public_path('uploads/services/'.$data->help_image));
            }
    
            $help_name = time() . '_help_image.' . $request->file('help_image')->extension();
            $request->file('help_image')->move(public_path('uploads/services'), $help_name);
        }
        if($request->benefits_image){
            if(File::exists(public_path('uploads/services/'.$data->benefits_image))){
                File::delete(public_path('uploads/services/'.$data->benefits_image));
            }
    
            $benefits_name = time() . '_benefits_image.' . $request->file('benefits_image')->extension();
            $request->file('benefits_image')->move(public_path('uploads/services'), $benefits_name);
        }

        $input = $request->all();
        $input['banner'] = $banner_name;
        $input['video_thumbnail'] = $video_name;
        $input['help_image'] = $help_name;
        $input['benefits_image'] = $benefits_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/services-attribute')->with('success','Data Attribute Services Berhasil diubah!');
        }else{
            return redirect('admin/services-attribute')->with('error','Data Attribute Services Gagal diubah!');
        }
    }
}
