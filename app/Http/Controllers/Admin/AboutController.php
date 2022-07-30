<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Team;
use File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = About::first();
        return view('admin.about.form',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in uploads.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
            'tagline' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image_small' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'banner' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->video_is_active == 1) {
            $request->validate([
                'video_title' => 'required',
                'video_thumbnail' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'video_url' => 'required',
            ]);
        }

        $data = About::find($id);
        $image_name = $data->image;
        $img_small_name = $data->image_small;
        $banner_name = $data->banner;
        $video_thum_name = $data->video_thumbnail;
        if($request->image){
            if(File::exists(public_path('uploads/about/'.$data->image))){
                File::delete(public_path('uploads/about/'.$data->image));
            }
    
            $image_name = time() . '_image.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('uploads/about'), $image_name);
        }
        if($request->image_small){
            if(File::exists(public_path('uploads/about/'.$data->image_small))){
                File::delete(public_path('uploads/about/'.$data->image_small));
            }
    
            $img_small_name = time() . '_image_small.' . $request->file('image_small')->extension();
            $request->file('image_small')->move(public_path('uploads/about'), $img_small_name);
        }
        if($request->banner){
            if(File::exists(public_path('uploads/banner/'.$data->banner))){
                File::delete(public_path('uploads/banner/'.$data->banner));
            }
    
            $banner_name = time() . '_about.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('uploads/banner'), $banner_name);
        }
        if($request->video_thumbnail){
            if(File::exists(public_path('uploads/about/'.$data->video_thumbnail))){
                File::delete(public_path('uploads/about/'.$data->video_thumbnail));
            }
    
            $video_thum_name = time() . '_video_thumbnail.' . $request->file('video_thumbnail')->extension();
            $request->file('video_thumbnail')->move(public_path('uploads/about'), $video_thum_name);
        }

        $input = $request->all();
        $input['video_is_active'] = $request->video_is_active == 1 ? 1 : 0;
        $input['brand_is_active'] = $request->brand_is_active == 1 ? 1 : 0;
        $input['testimonial_is_active'] = $request->testimonial_is_active == 1 ? 1 : 0;
        $input['team_is_active'] = $request->team_is_active == 1 ? 1 : 0;
        $input['image'] = $image_name;
        $input['image_small'] = $img_small_name;
        $input['banner'] = $banner_name;
        $input['video_thumbnail'] = $video_thum_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/about')->with('success','Data About Berhasil diubah!');
        }else{
            return redirect('admin/about')->with('error','Data About Gagal diubah!');
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
        //
    }
}
