<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;
use File;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = HomePage::first();
        return view('admin.home_page.form',$data);
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
        if ($request->trusted_is_active == 1) {
            $request->validate([
                'trusted_title' => 'required',
                'trusted_count' => 'required',
                'trusted_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
        }

        if ($request->improve_is_active == 1) {
            $request->validate([
                'improve_project_complete' => 'required',
                'improve_tagline' => 'required',
                'improve_title' => 'required',
                'improve_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'improve_background' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
        }
        
        if ($request->cta_is_active == 1) {
            $request->validate([
                'cta_sub_title' => 'required',
                'cta_title' => 'required',
                'cta_url' => 'required',
                'cta_background' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
        }
        $data = HomePage::find($id);
        $trust_name = $data->trusted_image;
        $improve_name = $data->improve_image;
        $improve_bg_name = $data->improve_background;
        $cta_name = $data->cta_background;
        if($request->trusted_image){
            if(File::exists(public_path('uploads/home_page/'.$data->trusted_image))){
                File::delete(public_path('uploads/home_page/'.$data->trusted_image));
            }
    
            $trust_name = time() . '_trusted.' . $request->file('trusted_image')->extension();
            $request->file('trusted_image')->move(public_path('uploads/home_page'), $trust_name);
        }
        if($request->improve_image){
            if(File::exists(public_path('uploads/home_Page/'.$data->improve_image))){
                File::delete(public_path('uploads/home_Page/'.$data->improve_image));
            }
    
            $improve_name = time() . '_improve.' . $request->file('improve_image')->extension();
            $request->file('improve_image')->move(public_path('uploads/home_Page'), $improve_name);
        }
        if($request->improve_background){
            if(File::exists(public_path('uploads/home_Page/'.$data->improve_background))){
                File::delete(public_path('uploads/home_Page/'.$data->improve_background));
            }
    
            $improve_bg_name = time() . '_improve_background.' . $request->file('improve_background')->extension();
            $request->file('improve_background')->move(public_path('uploads/home_Page'), $improve_bg_name);
        }
        if($request->cta_background){
            if(File::exists(public_path('uploads/home_page/'.$data->cta_background))){
                File::delete(public_path('uploads/home_page/'.$data->cta_background));
            }
    
            $cta_name = time() . '_cta_background.' . $request->file('cta_background')->extension();
            $request->file('cta_background')->move(public_path('uploads/home_page'), $cta_name);
        }

        $input = $request->all();
        $input['brand_is_active'] = $request->brand_is_active == 1 ? 1 : 0;
        $input['feature_is_active'] = $request->feature_is_active == 1 ? 1 : 0;
        $input['about_is_active'] = $request->about_is_active == 1 ? 1 : 0;
        $input['services_is_active'] = $request->services_is_active == 1 ? 1 : 0;
        $input['trusted_is_active'] = $request->trusted_is_active == 1 ? 1 : 0;
        $input['project_is_active'] = $request->project_is_active == 1 ? 1 : 0;
        $input['improve_is_active'] = $request->improve_is_active == 1 ? 1 : 0;
        $input['testimonial_is_active'] = $request->testimonial_is_active == 1 ? 1 : 0;
        $input['news_is_active'] = $request->news_is_active == 1 ? 1 : 0;
        $input['cta_is_active'] = $request->cta_is_active == 1 ? 1 : 0;
        $input['trusted_image'] = $trust_name;
        $input['improve_image'] = $improve_name;
        $input['improve_background'] = $improve_bg_name;
        $input['cta_background'] = $cta_name;
        $status = $data->fill($input)->save();

        if($status){
            return redirect('admin/home-page')->with('success','Data Home Page Berhasil diubah!');
        }else{
            return redirect('admin/home-page')->with('error','Data Home Page Gagal diubah!');
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
